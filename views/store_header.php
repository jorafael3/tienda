<?php

$PARAM = $this->parametros_tienda[0][0];
$PARAM_HORARIOS = $this->parametros_tienda[1];
// var_dump($PARAM_HORARIOS);
$TITULO = "";
$NOMBRE_TIENDA = $PARAM["nombre_tienda"];
$UBICACION = $PARAM["map_ubicacion"];
$DIRECCION = $PARAM["calle_tienda"];
$TEL1 = $PARAM["telefono1_tienda"];
$TEL2 = $PARAM["telefono2_tienda"];
$EMAIL = $PARAM["email_tienda"];


$title_DIRECCION = "Direccion";
$title_HORARIOS = "Horarios";
$title_CONTACTOS = "Contactos";
$title_SOCIAL = "Redes Sociales";
$title_TEL1 = "Telefono 1";
$title_TEL2 = "Telefono 2";
$title_EMAIL = "E-mail";



?>

<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="d-flex flex-grow-1 flex-stack flex-wrap" id="kt_toolbar">
                    <div class="d-flex flex-column align-items-start me-3 gap-2">
                        <h1 class="fs-2hx "><?php echo $NOMBRE_TIENDA ?></h1>
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <button onclick="$('#Modal_info').modal('show')" type="button" class="btn btn-light " data-toggle="modal" data-target="#Modal_info">
                            <i class="bi bi-info-circle fs-2hx fw-bold"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="Modal_info" tabindex="-1" role="dialog" aria-labelledby="Modal_info" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-1000px" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $TITULO ?></h5>
                <button onclick="$('#Modal_info').modal('hide')" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <iframe src="<?php echo $UBICACION ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <h2 class="fs-3 mb-10 mb-md-11"><?php echo $NOMBRE_TIENDA ?></h2>
                                <div class="col-md-6 mb-11">
                                    <div class="d-flex align-items-start">
                                        <div class="d-none">
                                            <svg class="icon fs-2">
                                                <use xlink:href="#"></use>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="fs-5 mb-6"><?php echo $title_DIRECCION ?></h3>
                                            <div class="fs-6">
                                                <p class="mb-2 pb-4 fs-6"><?php echo $DIRECCION ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-7">
                                    <div class="d-flex align-items-start">
                                        <div class="d-none">
                                            <svg class="icon fs-2">
                                                <use xlink:href="#"></use>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="fs-5 mb-6"><?php echo $title_HORARIOS ?></h3>
                                            <div class="fs-6">
                                                <?php
                                                foreach ($PARAM_HORARIOS as $row) {
                                                ?>
                                                    <dl class="d-flex mb-0">
                                                        <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px"><?php echo $row["dia"] ?></dt>
                                                        <dd class="mb-0"> <?php echo date("H:i", strtotime($row["hora_inicio"])) ?> – <?php echo date("H:i", strtotime($row["hora_finalizacion"])) ?></dd>
                                                    </dl>
                                                <?php

                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-7">
                                    <div class="d-flex align-items-start">
                                        <div class="d-none">
                                            <svg class="icon fs-2">
                                                <use xlink:href="#"></use>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="fs-5 mb-6"><?php echo $title_CONTACTOS ?></h3>
                                            <div class="fs-6">
                                                <p class="mb-3 fs-6"><?php echo $title_TEL1 ?>: <span class="text-body-emphasis"><?php echo $TEL1 ?></span></p>
                                                <p class="mb-3 fs-6"><?php echo $title_TEL1 ?>: <span class="text-body-emphasis"><?php echo $TEL2 ?></span></p>
                                                <p class="mb-0 fs-6"><?php echo $title_EMAIL ?>: <?php echo $EMAIL ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <div class="d-none">
                                            <svg class="icon fs-2">
                                                <use xlink:href="#"></use>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="fs-5 mb-6"><?php echo $title_SOCIAL ?></h3>
                                        </div>
                                    </div>
                                    <div class="socical-icon social-icon-style-1 ">
                                        <ul class="list-inline fs-18px mb-0">
                                            <li class="list-inline-item me-7"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li class="list-inline-item me-7"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item me-7"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="$('#Modal_info').modal('hide')" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>