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
    // Cargar_Parametros();
    
</script>