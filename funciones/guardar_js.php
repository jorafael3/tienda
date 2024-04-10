<?php

$url_Cargar_Parametros_Tienda = constant('URL') . 'principal/Cargar_Parametros_Tienda/';
$url_Agregar_carrito = constant('URL') . 'principal/Agregar_carrito/';

?>

<script>
    var url_Cargar_Parametros_Tienda = '<?php echo $url_Cargar_Parametros_Tienda ?>';
    var url_Agregar_carrito = '<?php echo $url_Agregar_carrito ?>';

    var CAR_ARR = [];


    function Cargar_Parametros() {
        AjaxSendReceiveData(url_Cargar_Parametros_Tienda, [], function(x) {
            console.log('x: ', x);
        });
    }


    document.querySelectorAll('.btn-agregar').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            console.log('ID del producto:', productId);
            // Realizar acciones adicionales con el ID del producto aquí
            AjaxSendReceiveData()
        });
    });

    // Cargar_Parametros();
</script>