<?php

$DATOS_CATEGORIAS = $this->Categorias_Productos;
$DATOS_SUBCATEGORIAS = $this->Subcategorias_Productos;
// echo "<pre>";
// var_dump($DATOS_SUBCATEGORIAS);
// echo "</pre>";

$PRODUCT_CAT_WIDTH = "160px";
$PRODUCT_CAT_HEIGHT = "160px";


?>

<div class="container mt-1">
    <div class="row justify-content-center">
        <!-- <div class="col-md-12">
            <div class="row">
                <div class="d-flex flex-grow-1 flex-stack flex-wrap" id="kt_toolbar">
                    <div class="d-flex flex-column align-items-start me-3 gap-2">
                        <h1 class="fs-2hx ">TIENDA</h1>
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <button class="btn btn-light "><i class="bi bi-info-circle fs-2hx fw-bold"></i></button>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-12 mt-5">
            <!-- Contenido dentro del div -->
            <div class="content">
                <div class="d-flex flex-column flex-xl-row ">
                    <!--begin::Content-->
                    <div class="col-xl-8 col-md-12  p-5">
                        <!--begin::Pos food-->
                        <div class="card card-flush card-p-0 bg-transparent border-0">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Nav-->
                                <ul class="nav nav-pills nav-pills-custom mb-3 m-2" role="tablist">
                                    <!--begin::Item-->

                                    <?php
                                    foreach ($DATOS_CATEGORIAS as $row) {
                                        $product_cat_active = "";
                                        $product_cat_id = $row["id"];
                                        $product_cat_position = $row["position"];
                                        $product_cat_name = $row["cat_nombre"];
                                        $product_cat_icon = $row["cat_icon"];
                                        $product_cat_description = $row["cat_descripcion"];
                                        if ($row["position"] == 1) {
                                            $product_cat_active = "show active";
                                        }
                                    ?>
                                        <li class="nav-item mb-3 me-2" role="presentation">
                                            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg <?php echo $product_cat_active ?>" data-bs-toggle="pill" href="#kt_pos_food_content_<?php echo $product_cat_position ?>" style="width: <?php echo $PRODUCT_CAT_WIDTH ?>;height: <?php echo $PRODUCT_CAT_HEIGHT ?>" aria-selected="true" role="tab">
                                                <div class="nav-icon mb-3">
                                                    <img src="<?php echo $product_cat_icon ?>" class="w-100px" alt="img">
                                                </div>
                                                <div class="">
                                                    <span class="text-gray-800 fw-bold fs-4 d-block"><?php echo $product_cat_name ?></span>
                                                    <!-- <span class="text-gray-400 fw-semibold fs-7">8 Options</span> -->
                                                </div>
                                            </a>
                                        </li>
                                    <?php

                                    }
                                    ?>



                                </ul>



                                <div class="tab-content">

                                    <?php
                                    foreach ($DATOS_CATEGORIAS as $row) {
                                        $product_cat_position = $row["position"];
                                        $product_cat_active = "";
                                        if ($product_cat_position == 1) {
                                            $product_cat_active = "show active";
                                        }

                                    ?>


                                        <div class="tab-pane fade <?php echo $product_cat_active ?>" id="kt_pos_food_content_<?php echo $product_cat_position ?>" role="tabpanel">

                                            <div class="">
                                                <ul class="list-unstyled">

                                                    <?php

                                                    foreach ($DATOS_SUBCATEGORIAS as $rows) {
                                                        $product_cat_position_sub = $rows["position"];
                                                        if ($product_cat_position == $product_cat_position_sub) {
                                                            $prod_nombre = $rows["prod_nombre"];
                                                            $prod_descripcion = $rows["prod_descripcion"];
                                                            $prod_img = $rows["prod_img"];
                                                            $img_path = constant("URL") . "recursos/products/imgs/" . $prod_img;
                                                            $prod_id = $rows["id"];
                                                            $prod_precio = $rows["prod_precio"];
                                                            $prod_agotado = $rows["prod_agotado"];
                                                            $prod_discount = $rows["prod_discount"];
                                                            $prod_discount_type = $rows["prod_discount_type"];
                                                            $prod_discount_value = $rows["prod_discount_value"];

                                                            $precio_sin_descuento = "";
                                                            if ($prod_discount == 1) {
                                                                $precio_sin_descuento = "$" . $prod_precio;
                                                                if ($prod_discount_type == 0) {
                                                                    $prod_precio = floatval($prod_precio) - floatval($prod_discount_value);
                                                                } else {
                                                                    $prod_precio = floatval($prod_precio) - (floatval($prod_precio * ($prod_discount_value / 100)));
                                                                }
                                                            }
                                                            $prod_precio = number_format($prod_precio, 2, '.', ',');
                                                            $prod_precio = "$" . $prod_precio;



                                                    ?>
                                                            <li class="mb-6">
                                                                <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">

                                                                    <div class="card-body pt-9 pb-0">
                                                                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                                                            <div class="col-2 me-7 mb-4" style="width: 200px;"> <!-- Establece el ancho máximo del contenedor -->
                                                                                <div class="">
                                                                                    <img src="<?php echo $prod_img ?>" alt="image" style="width: 100%; height: 150px;"> <!-- Establece el ancho al 100% y deja que la altura se ajuste automáticamente -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-8 flex-grow-1">
                                                                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                                                    <div class="col-12">
                                                                                        <div class="d-flex align-items-center mb-2">
                                                                                            <h3 class="text-gray-900  fs-2 fw-bold me-1"><?php echo $prod_nombre ?></h3>
                                                                                            <?php
                                                                                            if ($prod_discount == 1) {
                                                                                            ?>
                                                                                                <a class="btn btn-sm btn-light-success fw-bolder ms-2 fs-7 py-1 px-3">
                                                                                                    <?php echo ($prod_discount_type == 1 ?  "-" . $prod_discount_value . "% Descuento" : "-$" . $prod_discount_value . " Descuento") ?>
                                                                                                </a>

                                                                                            <?php
                                                                                            }
                                                                                            ?>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 mb-2">
                                                                                        <span class="text-gray-600 fw-semibold d-block fs-6 mt-3"><?php echo $prod_descripcion ?></span>

                                                                                    </div>
                                                                                    <div class="col-12 mt-10 d-flex justify-content-between align-ite5s-center">
                                                                                        <h5 class="text-dark fw-bold fs-1 mr-3"><?php echo $prod_precio ?>
                                                                                            <span class="fs-5 text-muted text-decoration-line-through"><?php echo $precio_sin_descuento ?></span>
                                                                                        </h5>
                                                                                        <?php
                                                                                        if ($prod_agotado == 0) {

                                                                                        ?>
                                                                                            <button href="#" class="btn btn-sm btn-primary me-2 btn-agregar" data-product-id="<?php echo $prod_id ?>">Agregar</button>
                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <span class="fs-4 text-danger me-2 fw-bold">Agotado</span>

                                                                                        <?php
                                                                                        }
                                                                                        ?>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </li>




                                                    <?php

                                                        }
                                                    }

                                                    ?>

                                                </ul>


                                            </div>

                                        </div>

                                    <?php

                                    }

                                    ?>


                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Pos food-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Sidebar-->
                    <div class="col-xl-5 p-5">
                        <!--begin::Pos order-->
                        <div class="card card-flush bg-body" id="kt_pos_form">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <h3 class="card-title fw-bold text-gray-800 fs-2qx">Orden</h3>
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <button data-kt-dialer-control="Clear_All" class="btn btn-light-primary fs-4 fw-bold py-4">Limpiar</button>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-0">
                                <!--begin::Table container-->
                                <div class="table-responsive mb-8">
                                    <!--begin::Table-->
                                    <table class="table align-middle gs-0 gy-4 my-0 table-car">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr>
                                                <th class="min-w-175px"></th>
                                                <th class="w-125px"></th>
                                                <th class="w-60px"></th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                                <!--begin::Summary-->
                                <div class="col-12 p-2">
                                    <textarea class="form-control nota" placeholder="Nota" name="" id="" cols="30" rows="3"></textarea>

                                </div>

                                <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bold text-white">
                                        <span class="d-block lh-1 mb-2">Subtotal</span>
                                        <span class="d-block mb-2">Discounts</span>
                                        <span class="d-block mb-9">Tax(15%)</span>
                                        <span class="d-block fs-2qx lh-1">Total</span>
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bold text-white text-end">
                                        <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$0.00</span>
                                        <span class="d-block mb-2" data-kt-pos-element="discount">$0.00</span>
                                        <span class="d-block mb-9" data-kt-pos-element="tax">$0.00</span>
                                        <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">$0.00</span>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Summary-->
                                <!--begin::Payment Method-->
                                <div class="m-0">
                                    <!--begin::Title-->
                                    <h1 class="fw-bold text-gray-800 mb-5">Metodos de pago</h1>
                                    <!--end::Title-->
                                    <!--begin::Radio group-->
                                    <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-8" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                                        <ul class="nav nav-pills nav-pills-custom mb-3 m-2" role="tablist">
                                            <!--begin::Item-->

                                            <?php
                                            // foreach (1) {

                                            ?>
                                            <div class="row ">
                                                <div class="col-4">
                                                    <li class="nav-item mb-3 me-2" role="presentation">
                                                        <a data-kt-dialer-control="pay_m" data-kt-dialer-check_value="1" class="bg-light nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-5 pb-7 page-bg <?php echo $product_cat_active ?>" data-bs-toggle="pill" style="width: 100px;height: 100px" aria-selected="true" role="tab">
                                                            <div class="nav-icon mb-2">
                                                                <i class="bi bi-paypal fs-2hx"></i>
                                                            </div>
                                                            <div class="">
                                                                <span class="text-gray-800 fw-bold fs-4 d-block">Paypal</span>

                                                            </div>
                                                        </a>

                                                    </li>
                                                </div>
                                                <div class="col-4">
                                                    <li class="nav-item mb-3 me-2" role="presentation">
                                                        <a data-kt-dialer-control="pay_m" data-kt-dialer-check_value="2" class="bg-light nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-5 pb-7 page-bg <?php echo $product_cat_active ?>" data-bs-toggle="pill" style="width: 100px;height: 100px" aria-selected="true" role="tab">
                                                            <div class="nav-icon mb-2">
                                                                <i class="bi bi-credit-card-fill fs-2hx"></i>
                                                            </div>
                                                            <div class="">
                                                                <span class="text-gray-800 fw-bold fs-4 d-block">Tarjeta</span>

                                                            </div>
                                                        </a>
                                                    </li>
                                                </div>
                                                <div class="col-4">
                                                    <li class="nav-item mb-3 me-2" role="presentation">
                                                        <a data-kt-dialer-control="pay_m" data-kt-dialer-check_value="3" class="bg-light nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-5 pb-7 page-bg <?php echo $product_cat_active ?>" data-bs-toggle="pill" style="width: 100px;height: 100px" aria-selected="true" role="tab">
                                                            <div class="nav-icon mb-2">
                                                                <i class="bi bi-credit-card-fill fs-2hx"></i>
                                                            </div>
                                                            <div class="">
                                                                <span class="text-gray-800 fw-bold fs-4 d-block">Tarjeta</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </div>

                                            </div>

                                            <?php

                                            // }
                                            ?>



                                        </ul>
                                        <!-- <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="0">
                                            <i class="fonticon-cash-payment fs-2hx mb-2 pe-0"></i>
                                            <span class="fs-7 fw-bold d-block">Cash</span>
                                        </label>
                                        <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 active" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="1">
                                            <i class="fonticon-card fs-2hx mb-2 pe-0"></i>
                                            <span class="fs-7 fw-bold d-block">Card</span>
                                        </label>
                                        <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="2">
                                            <i class="fonticon-mobile-payment fs-2hx mb-2 pe-0"></i>
                                            <span class="fs-7 fw-bold d-block">E-Wallet</span>
                                        </label> -->
                                    </div>
                                    <!--end::Radio group-->
                                    <!--begin::Actions-->
                                    <button data-kt-dialer-control="Pay" class="btn btn-primary fs-1 w-100 py-4">Pagar</button>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Payment Method-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Pos order-->
                    </div>
                    <!--end::Sidebar-->
                </div>
            </div>
        </div>
    </div>
</div>