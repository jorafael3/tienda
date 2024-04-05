<?php

$url_Cargar_Parametros_Tienda = constant('URL') . 'principal/Cargar_Parametros_Tienda/';

?>

<script>
    var url_Cargar_Parametros_Tienda = '<?php echo $url_Cargar_Parametros_Tienda ?>';

    var TELEFONO;

    function Mensaje(t1, t2, ic) {
        Swal.fire(
            t1,
            t2,
            ic
        );
    }

    function Cargar_Parametros() {
        AjaxSendReceiveData(url_Cargar_Parametros_Tienda, [], function(x) {
            console.log('x: ', x);
        });
    }
    Cargar_Parametros();
    
    function AjaxSendReceiveData(url, data, callback) {
        var xmlhttp = new XMLHttpRequest();

        // Mostrar la barra de progreso al iniciar la solicitud AJAX
        $.blockUI({
            message: '<div class="d-flex justify-content-center align-items-center">' +
                '<p class="mr-3 mb-0">Estamos validando tus datos ...</p>' +
                '<div class="progress" style="width: 150px;">' +
                '<div id="progressBar" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>' +
                '</div>' +
                '</div>',
            css: {
                backgroundColor: 'transparent',
                color: '#fff',
                border: '0'
            },
            overlayCSS: {
                opacity: 0.5
            }
        });

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                // Ocultar la barra de progreso cuando la solicitud AJAX haya finalizado
                $.unblockUI();
                if (this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    callback(data);
                } else {
                    // Manejar errores aquí
                }
            }
        };

        xmlhttp.upload.onprogress = function(event) {
            if (event.lengthComputable) {
                var percentComplete = (event.loaded / event.total) * 100;
                // Actualizar el valor de la barra de progreso mientras se carga la solicitud
                document.getElementById("progressBar").style.width = percentComplete + "%";
            }
        };

        xmlhttp.onerror = function() {
            // Ocultar la barra de progreso en caso de error
            $.unblockUI();
            // Manejar errores aquí
        };

        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    }


    // function AjaxSendReceiveData(url, data, callback) {
    //     var xmlhttp = new XMLHttpRequest();
    //     $.blockUI({
    //         message: '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Cargando ...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
    //         css: {
    //             backgroundColor: 'transparent',
    //             color: '#fff',
    //             border: '0'
    //         },
    //         overlayCSS: {
    //             opacity: 0.5
    //         }
    //     });

    //     xmlhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             var data = this.responseText;
    //             data = JSON.parse(data);
    //             callback(data);
    //         }
    //     }
    //     xmlhttp.onload = () => {
    //         $.unblockUI();
    //         // 
    //     };
    //     xmlhttp.onerror = function() {
    //         $.unblockUI();
    //     };
    //     data = JSON.stringify(data);
    //     xmlhttp.open("POST", url, true);
    //     xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //     xmlhttp.send(data);

    // }
</script>