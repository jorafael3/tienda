<?php

$url_Cargar_Parametros_Tienda = constant('URL') . 'principal/Cargar_Parametros_Tienda/';
$url_Agregar_carrito = constant('URL') . 'principal/Agregar_carrito/';

?>

<script>
    var url_Cargar_Parametros_Tienda = '<?php echo $url_Cargar_Parametros_Tienda ?>';
    var url_Agregar_carrito = '<?php echo $url_Agregar_carrito ?>';

    var CAR_ARR = [];
    var METODO = 0;


    function Cargar_Parametros() {
        AjaxSendReceiveData(url_Cargar_Parametros_Tienda, [], function(x) {

        });
    }

    var productosAgregados = new Set();
    // Inicializar un arreglo para almacenar los detalles de los productos agregados
    var detallesProductos = [];

    // Función para agregar un producto al carrito
    function agregarProducto(productId) {
        // Verificar si el producto ya ha sido agregado
        var productoExistente = detallesProductos.find(function(producto) {
            return producto.id === productId;
        });

        if (!productoExistente) {
            // Agregar los detalles del producto al arreglo de detalles de productos
            detallesProductos.push({
                id: productId,
                cantidad: 1,
                precio: 0,
                impuesto: 0,
                taza_impuesto: 0,
                subtotal: 0,
                descuento: 0,
                descuento_valor: 0
            });

            return true; // Producto agregado con éxito
        } else {
            return false; // Producto ya existente
        }
    }

    document.querySelectorAll('.btn-agregar').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');

            // Realizar acciones adicionales con el ID del producto aquí
            let val = agregarProducto(productId);

            if (val) {
                AjaxSendReceiveData(url_Agregar_carrito, {
                    id: productId
                }, function(x) {
                    console.log('x: ', x);

                    if (x.success == true) {
                        let data = x.data
                        $(".table-car tbody").append(x.html);

                        detallesProductos.map(function(y) {

                            if (y.id == productId) {
                                y.precio = data["prod_precio"];
                                y.taza_impuesto = data["taza_impuesto"];
                                y.subtotal = parseFloat(data["prod_precio"]) * parseInt(y.cantidad);
                                y.descuento_valor = data["prod_discount"] == 1 ? data["prod_discount_value"] : 0;
                                y.descuento_tipo = data["prod_discount_type"]
                                if (y.descuento_tipo == 0) {
                                    y.descuento_total = parseFloat(y.descuento_valor)
                                } else {
                                    y.descuento_total = parseFloat(y.precio * (y.descuento_valor / 100))
                                }
                                y.descuento = y.descuento_total

                            }
                        });
                        console.log('detallesProductos: ', detallesProductos);

                        actualizarResumenPedido()

                    } else {
                        Mensaje("", x.html, "error")
                    }
                })
            }



        });
    });

    // Asociar evento de clic a los botones de incremento y decremento
    $(document).on('click', '[data-kt-dialer-control="increase"]', function() {
        // Tu código para aumentar el valor aquí
        // Obtener el input asociado al botón de incremento
        var input = $(this).closest('[data-kt-dialer="true"]').find('input[data-kt-dialer-control="input"]');
        // Obtener el valor actual del input y convertirlo a número
        var currentValue = parseInt(input.val());
        // Incrementar el valor
        var newValue = currentValue + 1;
        // Actualizar el valor del input
        input.val(newValue);
        var precioBase = parseFloat($(this).closest('[data-kt-pos-element="item"]').data('kt-pos-item-price'));

        // Actualizar el precio total
        var precioTotal = precioBase * newValue;
        $(this).closest('[data-kt-pos-element="item"]').find('[data-kt-pos-element="item-total"]').text('$' + precioTotal.toFixed(2));

        var productId = $(this).closest('[data-kt-pos-element="item"]').data('kt-pos-item-id');



        detallesProductos.forEach(function(producto) {
            if (producto.id == productId) {
                producto.cantidad = newValue;
                producto.subtotal = parseInt(newValue) * parseFloat(producto.precio);
                producto.descuento = parseFloat(producto.descuento_total) * newValue
            }
        });

        console.log('detallesProductos: ', detallesProductos);

        actualizarResumenPedido();
    });

    $(document).on('click', '[data-kt-dialer-control="decrease"]', function() {
        // Obtener el input asociado al botón de decremento
        var input = $(this).closest('[data-kt-dialer="true"]').find('input[data-kt-dialer-control="input"]');
        // Obtener el valor actual del input y convertirlo a número
        var currentValue = parseInt(input.val());
        // Verificar si el valor actual es mayor que 1 antes de decrementarlo
        if (currentValue > 1) {
            // Decrementar el valor
            var newValue = currentValue - 1;
            // Actualizar el valor del input
            input.val(newValue);

            var precioBase = parseFloat($(this).closest('[data-kt-pos-element="item"]').data('kt-pos-item-price'));

            // Actualizar el precio total
            var precioTotal = precioBase * newValue;
            $(this).closest('[data-kt-pos-element="item"]').find('[data-kt-pos-element="item-total"]').text('$' + precioTotal.toFixed(2));

            var productId = $(this).closest('[data-kt-pos-element="item"]').data('kt-pos-item-id');


            detallesProductos.forEach(function(producto, index) {
                if (producto.id == productId) {
                    producto.cantidad = newValue;
                    producto.subtotal = parseInt(newValue) * parseFloat(producto.precio);
                    producto.descuento = parseFloat(producto.descuento_total) * newValue
                    // Si la cantidad es menor o igual a 0, eliminar el producto del arreglo
                    if (newValue <= 0) {
                        detallesProductos.splice(index, 1);
                    }
                }
            });
        } else {
            var productId = $(this).closest('[data-kt-pos-element="item"]').data('kt-pos-item-id');

            detallesProductos.forEach(function(producto, index) {
                if (producto.id == productId) {
                    // Si la cantidad es menor o igual a 0, eliminar el producto del arreglo
                    detallesProductos.splice(index, 1);
                }
            });

            $(this).closest('[data-kt-pos-element="item"]').remove();
        }

        actualizarResumenPedido();

    });

    $(document).on('click', '[data-kt-dialer-control="Clear_All"]', function() {

        detallesProductos = [];
        $(".table-car tbody").empty();
        actualizarResumenPedido()
    });

    $(document).on('click', '[data-kt-dialer-control="Pay"]', function() {
        let param = {
            PRODS: detallesProductos,
            NOTA: $(".nota").val(),
            METODO: METODO
        }
        if (detallesProductos.length > 0) {
            if (METODO > 0) {
                console.log('param: ', param);

            } else {
                Mensaje("Debe seleccionar un metodo de pago", "", "error");

            }
        } else {
            Mensaje("Debe agregar productos a la orden", "", "error");
        }

    });

    $(document).on('click', '[data-kt-dialer-control="pay_m"]', function() {
        let val = $(this).attr("data-kt-dialer-check_value");
        console.log('val: ', val);
        METODO = val
    });






    function actualizarResumenPedido() {
        // Calcular el subtotal sumando los precios de todos los productos
        let SUBTOTAL = 0;
        let IMPUESTOS = 0;
        let TOTAL = 0;
        let DESCUENTO = 0;
        detallesProductos.map(function(x) {
            SUBTOTAL = SUBTOTAL + parseFloat(x.subtotal)
            IMPUESTOS = IMPUESTOS + parseFloat(x.subtotal * (x.taza_impuesto / 100))
            let des = x.descuento_tipo;
            // 0 VALOR FIJO - 1 %
            DESCUENTO = DESCUENTO + parseFloat(x.descuento)
            // TOTAL = TOTAL + parseFloat(x.total)
        });
        // Actualizar los elementos HTML con los nuevos valores
        $('[data-kt-pos-element="total"]').text('$' + SUBTOTAL.toFixed(2));
        $('[data-kt-pos-element="discount"]').text('-$' + DESCUENTO.toFixed(2));
        $('[data-kt-pos-element="tax"]').text('$' + IMPUESTOS.toFixed(2));
        $('[data-kt-pos-element="grant-total"]').text('$' + (SUBTOTAL + IMPUESTOS - DESCUENTO).toFixed(2));
    }

    // Cargar_Parametros();
</script>