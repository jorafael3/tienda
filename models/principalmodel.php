<?php

class principalmodel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function Cargar_Parametros_Tienda($param)
    {
        try {
            $table = "productos_subcategorias";
            $campos = ["*"];
            $join = [];
            $condiciones = ["fecha_creado >=" => '20240404'];
            $ordenamiento = "";
            $agrupamiento = "";
            $result = $this->select($table, $campos, $condiciones, $join, $ordenamiento, $agrupamiento);
      

            // $tabla = "productos_categorias";
            // $datos = ["cat_nombre" => "HAMBURGUESAS"];
            // $condiciones = ["id" => 1];
            // $result = $this->update($tabla, $datos, $condiciones);


            // $tabla = "productos_categorias";
            // $datos = ["cat_nombre" => "Nuevo Usuario"];
            // $result = $this->insert($tabla, $datos);

            $res = array(
                "success" => $result[0],
                "data" => $result[1],
                "sql" => $result[2]
            );

            echo json_encode($res);
            exit();
        } catch (Exception $e) {
            $res = array(
                "success" => false,
                "error" => $e->getMessage()
            );
            echo json_encode($res);
            exit();
        }
    }
}
