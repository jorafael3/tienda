<?php


class Principal extends Controller
{

    function __construct()
    {

        parent::__construct();
    }
    function render()
    {
        $folder = "principal";
        $view = "nueva";
        $assets = [
            'guardar_js.php'
        ];
        $parametros_tienda =  $this->model->Cargar_Parametros_Tienda();
        $this->view->parametros_tienda = $parametros_tienda;
        $Categorias_Productos =  $this->model->Cargar_Categorias();
        $this->view->Categorias_Productos = $Categorias_Productos;
        $Subcategorias_Productos =  $this->model->Cargar_Subcategorias();
        $this->view->Subcategorias_Productos = $Subcategorias_Productos;
        $this->view->render($folder . "/" . $view, $assets);
    }


    function Cargar_Parametros_Tienda()
    {

        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Cargar_Parametros_Tienda($array);
    }
    function Agregar_carrito()
    {

        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Agregar_carrito($array);
    }
}
