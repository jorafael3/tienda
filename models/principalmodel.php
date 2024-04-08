<?php

class principalmodel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function Cargar_Parametros_Tienda()
    {
        try {

            $TIENDA = constant("TIENDA_KEY");
            $table = "parametros_tienda";
            $campos = ["*"];
            $join = [];
            $condiciones = ["TIENDA_ID" => $TIENDA];
            $ordenamiento = "";
            $agrupamiento = "";
            $result = $this->select($table, $campos, $condiciones, $join, $ordenamiento, $agrupamiento);


            $table = "parametros_Horarios";
            $campos = ["*"];
            $join = [];
            $condiciones = ["tienda_id" => $result[1][0]["id"]];
            $ordenamiento = "";
            $agrupamiento = "";
            $result2 = $this->select($table, $campos, $condiciones, $join, $ordenamiento, $agrupamiento);

            // $res = array(
            //     "success" => $result[0],
            //     "data" => $result[1],
            //     "sql" => $result[2]F
            // );

            return [$result[1], $result2[1]];
        } catch (Exception $e) {
            $res = array(
                "success" => false,
                "error" => $e->getMessage()
            );
            echo json_encode($res);
            exit();
        }
    }

    function Cargar_Categorias()
    {
        try {

            $TIENDA = constant("TIENDA_ID");
            $table = "productos_categorias";
            $campos = ["*"];
            $join = [];
            $condiciones = ["tienda_id" => $TIENDA];
            $ordenamiento = "position asc";
            $agrupamiento = "";
            $result = $this->select($table, $campos, $condiciones, $join, $ordenamiento, $agrupamiento);



            return $result[1];
        } catch (Exception $e) {
            $res = array(
                "success" => false,
                "error" => $e->getMessage()
            );
            echo json_encode($res);
            exit();
        }
    }


    function Cargar_Subcategorias()
    {
        try {

            $TIENDA = constant("TIENDA_ID");
            $table = "productos_fichero pf";
            $campos = ["pf.*,
            ps.sub_nombre,
            pc.cat_nombre,
            pc.`position` "];
            $join = ["left join productos_subcategorias ps 
            on ps.id = pf.prod_subcat_id 
            left join productos_categorias pc 
            on pc.id = ps.cat_id"];
            $condiciones = ["pc.tienda_id" => $TIENDA];
            $ordenamiento = "pc.`position` asc";
            $agrupamiento = "";
            $result = $this->select($table, $campos, $condiciones, $join, $ordenamiento, $agrupamiento);
            return $result[1];
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
