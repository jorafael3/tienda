<?php

require 'views/header.php';

// var_dump($this->proveedores);
?>
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
        </div>
        <div class="col-md-12 mt-5">
            <!-- Contenido dentro del div -->
            <div class="content">
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
                        <!--begin::Pos food-->
                        <div class="card card-flush card-p-0 bg-transparent border-0">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Nav-->
                                <ul class="nav nav-pills d-flex justify-content-between nav-pills-custom d-grid gap-3 gap-lg-6 mb-6" role="tablist">
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-0" role="presentation">
                                        <!--begin::Nav link-->
                                        <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show active" data-bs-toggle="pill" href="#kt_pos_food_content_1" style="width: 138px;height: 180px" aria-selected="true" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <!--begin::Food icon-->
                                                <img src="assets/media/svg/food-icons/spaghetti.svg" class="w-50px" alt="">
                                                <!--end::Food icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="">
                                                <span class="text-gray-800 fw-bold fs-2 d-block">Lunch</span>
                                                <span class="text-gray-400 fw-semibold fs-7">8 Options</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::Nav link-->
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-0" role="presentation">
                                        <!--begin::Nav link-->
                                        <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg" data-bs-toggle="pill" href="#kt_pos_food_content_2" style="width: 138px;height: 180px" aria-selected="false" tabindex="-1" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <!--begin::Food icon-->
                                                <img src="assets/media/svg/food-icons/salad.svg" class="w-50px" alt="">
                                                <!--end::Food icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="">
                                                <span class="text-gray-800 fw-bold fs-2 d-block">Salad</span>
                                                <span class="text-gray-400 fw-semibold fs-7">14 Salads</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::Nav link-->
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-0" role="presentation">
                                        <!--begin::Nav link-->
                                        <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg" data-bs-toggle="pill" href="#kt_pos_food_content_3" style="width: 138px;height: 180px" aria-selected="false" tabindex="-1" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <!--begin::Food icon-->
                                                <img src="assets/media/svg/food-icons/cheeseburger.svg" class="w-50px" alt="">
                                                <!--end::Food icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="">
                                                <span class="text-gray-800 fw-bold fs-2 d-block">Burger</span>
                                                <span class="text-gray-400 fw-semibold fs-7">5 Burgers</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::Nav link-->
                                    </li>

                                    <li class="nav-item mb-3 me-0" role="presentation">
                                        <!--begin::Nav link-->
                                        <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg" data-bs-toggle="pill" href="#kt_pos_food_content_3" style="width: 138px;height: 180px" aria-selected="false" tabindex="-1" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <!--begin::Food icon-->
                                                <img src="assets/media/svg/food-icons/cheeseburger.svg" class="w-50px" alt="">
                                                <!--end::Food icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="">
                                                <span class="text-gray-800 fw-bold fs-2 d-block">Burger</span>
                                                <span class="text-gray-400 fw-semibold fs-7">5 Burgers</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::Nav link-->
                                    </li>

                                </ul>
                                <!--end::Nav-->
                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_pos_food_content_1" role="tabpanel">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
                                            <!--begin::Card-->
                                            <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                <!--begin::Body-->
                                                <div class="card-body text-center">
                                                    <!--begin::Food img-->
                                                    <img src="assets/media/stock/food/img-2.jpg" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
                                                    <!--end::Food img-->
                                                    <!--begin::Info-->
                                                    <div class="mb-2">
                                                        <!--begin::Title-->
                                                        <div class="text-center">
                                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">T-Bone Stake</span>
                                                            <span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">16 mins to cook</span>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Total-->
                                                    <span class="text-success text-end fw-bold fs-1">$16.50$</span>
                                                    <!--end::Total-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card-->
                                            <!--begin::Card-->
                                            <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                <!--begin::Body-->
                                                <div class="card-body text-center">
                                                    <!--begin::Food img-->
                                                    <img src="assets/media/stock/food/img-7.jpg" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
                                                    <!--end::Food img-->
                                                    <!--begin::Info-->
                                                    <div class="mb-2">
                                                        <!--begin::Title-->
                                                        <div class="text-center">
                                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">Chef’s Salmon</span>
                                                            <span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">16 mins to cook</span>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Total-->
                                                    <span class="text-success text-end fw-bold fs-1">$12.40$</span>
                                                    <!--end::Total-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_pos_food_content_2" role="tabpanel">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
                                            <!--begin::Card-->
                                            <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                <!--begin::Body-->
                                                <div class="card-body text-center">
                                                    <!--begin::Food img-->
                                                    <img src="assets/media/stock/food/img-11.jpg" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
                                                    <!--end::Food img-->
                                                    <!--begin::Info-->
                                                    <div class="mb-2">
                                                        <!--begin::Title-->
                                                        <div class="text-center">
                                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">Sweety</span>
                                                            <span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">16 mins to cook</span>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Total-->
                                                    <span class="text-success text-end fw-bold fs-1">$11.40$</span>
                                                    <!--end::Total-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card-->
                                            <!--begin::Card-->
                                            <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                <!--begin::Body-->
                                                <div class="card-body text-center">
                                                    <!--begin::Food img-->
                                                    <img src="assets/media/stock/food/img-5.jpg" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
                                                    <!--end::Food img-->
                                                    <!--begin::Info-->
                                                    <div class="mb-2">
                                                        <!--begin::Title-->
                                                        <div class="text-center">
                                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">Breakfast</span>
                                                            <span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">16 mins to cook</span>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Total-->
                                                    <span class="text-success text-end fw-bold fs-1">$8.20$</span>
                                                    <!--end::Total-->
                                                </div>
                                                <!--end::Body-->
                                            </div>

                                        </div>
                                        <!--end::Wrapper-->
                                    </div>

                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Pos food-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Sidebar-->
                    <div class="flex-row-auto w-xl-425px">
                        <!--begin::Pos order-->
                        <div class="card card-flush bg-body" id="kt_pos_form">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <h3 class="card-title fw-bold text-gray-800 fs-2qx">Current Order</h3>
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-light-primary fs-4 fw-bold py-4">Clear All</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-0">
                                <!--begin::Table container-->
                                <div class="table-responsive mb-8">
                                    <!--begin::Table-->
                                    <table class="table align-middle gs-0 gy-4 my-0">
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
                                            <tr data-kt-pos-element="item" data-kt-pos-item-price="33">
                                                <td class="pe-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/media/stock/food/img-2.jpg" class="w-50px h-50px rounded-3 me-3" alt="">
                                                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">T-Bone Stake</span>
                                                    </div>
                                                </td>
                                                <td class="pe-0">
                                                    <!--begin::Dialer-->
                                                    <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">
                                                        <!--begin::Decrease control-->
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                            <span class="svg-icon svg-icon-3x">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                        <!--end::Decrease control-->
                                                        <!--begin::Input control-->
                                                        <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="2">
                                                        <!--end::Input control-->
                                                        <!--begin::Increase control-->
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                            <span class="svg-icon svg-icon-3x">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                        <!--end::Increase control-->
                                                    </div>
                                                    <!--end::Dialer-->
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$66.00</span>
                                                </td>
                                            </tr>
                                            <tr data-kt-pos-element="item" data-kt-pos-item-price="7.5">
                                                <td class="pe-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/media/stock/food/img-9.jpg" class="w-50px h-50px rounded-3 me-3" alt="">
                                                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">Soup of the Day</span>
                                                    </div>
                                                </td>
                                                <td class="pe-0">
                                                    <!--begin::Dialer-->
                                                    <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">
                                                        <!--begin::Decrease control-->
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                            <span class="svg-icon svg-icon-3x">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                        <!--end::Decrease control-->
                                                        <!--begin::Input control-->
                                                        <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="1">
                                                        <!--end::Input control-->
                                                        <!--begin::Increase control-->
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                            <span class="svg-icon svg-icon-3x">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                        <!--end::Increase control-->
                                                    </div>
                                                    <!--end::Dialer-->
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$7.50</span>
                                                </td>
                                            </tr>
                                            <tr data-kt-pos-element="item" data-kt-pos-item-price="13.5">
                                                <td class="pe-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/media/stock/food/img-3.jpg" class="w-50px h-50px rounded-3 me-3" alt="">
                                                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">Pancakes</span>
                                                    </div>
                                                </td>
                                                <td class="pe-0">
                                                    <!--begin::Dialer-->
                                                    <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">
                                                        <!--begin::Decrease control-->
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                            <span class="svg-icon svg-icon-3x">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                        <!--end::Decrease control-->
                                                        <!--begin::Input control-->
                                                        <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="2">
                                                        <!--end::Input control-->
                                                        <!--begin::Increase control-->
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                            <span class="svg-icon svg-icon-3x">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                        <!--end::Increase control-->
                                                    </div>
                                                    <!--end::Dialer-->
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$27.00</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                                <!--begin::Summary-->
                                <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bold text-white">
                                        <span class="d-block lh-1 mb-2">Subtotal</span>
                                        <span class="d-block mb-2">Discounts</span>
                                        <span class="d-block mb-9">Tax(12%)</span>
                                        <span class="d-block fs-2qx lh-1">Total</span>
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bold text-white text-end">
                                        <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$100.50</span>
                                        <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                                        <span class="d-block mb-9" data-kt-pos-element="tax">$11.20</span>
                                        <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">$93.46</span>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Summary-->
                                <!--begin::Payment Method-->
                                <div class="m-0">
                                    <!--begin::Title-->
                                    <h1 class="fw-bold text-gray-800 mb-5">Payment Method</h1>
                                    <!--end::Title-->
                                    <!--begin::Radio group-->
                                    <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                                        <!--begin::Radio-->
                                        <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4" data-kt-button="true">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" name="method" value="0">
                                            <!--end::Input-->
                                            <!--begin::Icon-->
                                            <i class="fonticon-cash-payment fs-2hx mb-2 pe-0"></i>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="fs-7 fw-bold d-block">Cash</span>
                                            <!--end::Title-->
                                        </label>
                                        <!--end::Radio-->
                                        <!--begin::Radio-->
                                        <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 active" data-kt-button="true">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" name="method" value="1">
                                            <!--end::Input-->
                                            <!--begin::Icon-->
                                            <i class="fonticon-card fs-2hx mb-2 pe-0"></i>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="fs-7 fw-bold d-block">Card</span>
                                            <!--end::Title-->
                                        </label>
                                        <!--end::Radio-->
                                        <!--begin::Radio-->
                                        <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4" data-kt-button="true">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" name="method" value="2">
                                            <!--end::Input-->
                                            <!--begin::Icon-->
                                            <i class="fonticon-mobile-payment fs-2hx mb-2 pe-0"></i>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="fs-7 fw-bold d-block">E-Wallet</span>
                                            <!--end::Title-->
                                        </label>
                                        <!--end::Radio-->
                                    </div>
                                    <!--end::Radio group-->
                                    <!--begin::Actions-->
                                    <button class="btn btn-primary fs-1 w-100 py-4">Print Bills</button>
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


<!-- Meta Pixel Code -->
<!-- <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1534955887076711');
    fbq('track', 'PageView');
</script> -->
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1534955887076711&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->


<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<script src="assets/js/scripts.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<?php require 'views/footer.php'; ?>
<?php require 'funciones/guardar_js.php'; ?>
<script>
    // var codeInputs = $('.code-input');

    // // Añadir evento de entrada para cada campo
    // codeInputs.on('input', function() {
    //     // Obtener el índice del campo actual
    //     var currentIndex = codeInputs.index(this);

    //     // Mover al siguiente campo si se ha ingresado un dígito
    //     if ($(this).val().length === 1 && currentIndex < codeInputs.length - 1) {
    //         codeInputs.eq(currentIndex + 1).focus();
    //     }
    // });
    // codeInputs.first().focus();

    $(document).on('input', '.code-input', function(event) {
        var index = $('.code-input').index(this);
        if (event.originalEvent.inputType === 'deleteContentBackward' && index > 0) {
            if ($(this).val() === '') {
                index == 1 ? $('.code-input').eq(0).focus() : $('.code-input').eq(index - 1).focus();
            }
        } else if (index < $('.code-input').length - 1) {
            $('.code-input').eq(index + 1).focus();
        }
    });

    $(document).on('keydown', '.code-input', function(event) {
        if (event.which === 13) { // 13 is the keycode for Enter
            event.preventDefault();
            Validar_Codigo();
        }
    });

    $("#CELULAR").on('keydown', function(event) {
        if (event.which === 13) { // 13 is the keycode for Enter
            event.preventDefault();
            Guardar_Celular();
        }
    });
</script>