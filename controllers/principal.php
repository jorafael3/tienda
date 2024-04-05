<?php


class Principal extends Controller
{

    function __construct()
    {

        parent::__construct();
    }
    function render()
    {

        $this->view->render('principal/nueva');
    }


    function Cargar_Parametros_Tienda()
    {

        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Cargar_Parametros_Tienda($array);

      
    }

}
