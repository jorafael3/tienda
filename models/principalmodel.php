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

    function Agregar_carrito($param)
    {
        try {

            $IDPROD = $param["id"];

            $TIENDA = constant("TIENDA_ID");
            $table = "productos_fichero f";
            $campos = ["f.*,p.pr_valor as taza_impuesto"];
            $join = ["left join parametros p 
                    on p.id = f.prod_impuesto_id "];
            $condiciones = ["f.id" => $IDPROD, "f.tienda_id" => $TIENDA];
            $ordenamiento = "";
            $agrupamiento = "";
            $result = $this->select($table, $campos, $condiciones, $join, $ordenamiento, $agrupamiento);
            if ($result[0] == true) {
                $res = $result[1];
                if (count($res) > 0) {
                    $prod_agotado = $res[0]["prod_agotado"];
                    if ($prod_agotado == 0) {
                        $producto_id = $res[0]["id"];
                        $producto_nom = $res[0]["prod_nombre"];
                        $producto_precio = $res[0]["prod_precio"];
                        $prod_img = $res[0]["prod_img"];
                        $html = '<tr data-kt-pos-element="item" data-kt-pos-item-id="' . $producto_id . '" data-kt-pos-item-price="' . $producto_precio . '">
                        <td class="pe-0">
                            <div class="d-flex align-items-center">
                                <img src="' . $prod_img . '" class="w-50px h-50px rounded-3 me-3" alt="">
                                <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">' . $producto_nom . '</span>
                            </div>
                        </td>
                        <td class="pe-0">
                            <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">
                                <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                </button>
                                <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="1">
                                <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                            <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </td>
                        <td class="text-end">
                            <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$' . $producto_precio . '</span>
                        </td>
                        </tr>';
                        echo json_encode(array("success" => true, "html" => $html, "data" => $res[0]));
                        exit();
                    } else {
                        echo json_encode(array("success" => false, "html" => 'Producto Agotado', "data" => $res[0]));
                        exit();
                    }
                } else {
                    echo json_encode(array("success" => false, "html" => 'Producto no existe', "data" => $res[0]));
                    exit();
                }
            } else {
                echo json_encode(array("success" => false, "html" => 'Error inesperado, intentelo de nuevo', "data" => []));
                exit();
            }
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
