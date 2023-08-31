@extends('layouts.employee.app')

@section('title', 'Dashboard')

@section('section')

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Mobile Toggle-->
            <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                <span></span>
            </button>
            <!--end::Mobile Toggle-->
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard </h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="/employee/dashboard" class="text-muted">Dashboard</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Actions-->
            <a href="/employee/evaluations" class="btn btn-light-primary font-weight-bolder btn-sm">Evaluation Process</a>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar-->
        
    </div>
</div>
<!--end::Subheader-->
<!--begin::Content-->
<div class="content pt-0 d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <!--begin::Section-->
    <div class="container py-8">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <!--begin::Card-->
                        <a href="/employee/time-tracking" class="card card-custom wave wave-animate-slow bg-grey-100 mb-8 mb-lg-0">
                            <!--begin::Card Body-->
                            <div class="card-body">
                                <div class="d-flex align-items-center p-6">
                                    <!--begin::Icon-->
                                    <div class="mr-6">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3"
                                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                                        fill="currentColor" />
                                                    <rect x="7" y="17" width="6" height="2"
                                                        rx="1" fill="currentColor" />
                                                    <rect x="7" y="12" width="10" height="2"
                                                        rx="1" fill="currentColor" />
                                                    <rect x="7" y="7" width="6" height="2"
                                                        rx="1" fill="currentColor" />
                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column">
                                        <h3 class="text-dark h3 mb-3">Time Tracking</h3>
                                        <div class="text-dark-50">Your total tracking</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>
                            <!--end::Card Body-->
                        </a>
                        <!--end::Card-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Card-->
                        <a href="/employee/milaege-logs" class="card card-custom wave wave-animate bg-grey-100 mb-8 mb-lg-0">
                            <!--begin::Card Body-->
                            <div class="card-body">
                                <div class="d-flex align-items-center p-6">
                                    <!--begin::Icon-->
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-4x svg-icon-primary">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Clipboard-check.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24">
                                                    </rect>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="3"
                                                        width="20" height="18" rx="2"></rect>
                                                    <path
                                                        d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <circle fill="#000000" opacity="0.3" cx="19" cy="6"
                                                        r="1"></circle>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column">
                                        <h3 class="text-dark h3 mb-3">Mileage Logs</h3>
                                        <div class="text-dark-50">Your Mileage Logs</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>
                            <!--end::Card Body-->
                        </a>
                        <!--end::Card-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Card-->
                        <a href="#" class="card card-custom wave wave-animate-fast bg-grey-100">
                            <!--begin::Card Body-->
                            <div class="card-body">
                                <div class="d-flex align-items-center p-6">
                                    <!--begin::Icon-->
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-4x svg-icon-primary">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <rect fill="#000000" opacity="0.3" x="11" y="2"
                                                        width="2" height="14" rx="1" />
                                                    <path
                                                        d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column">
                                        <h3 class="text-dark h3 mb-3">Expenses</h3>
                                        <div class="text-dark-50">Track Your Expenses</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>
                            <!--end::Card Body-->
                        </a>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container" style = "margin-top: 25px ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-custom card-stretch card-stretch-half gutter-b" style="height: 100%">
                            <!--begin::Body-->
                            <div class="card-header">
                                <div class="card-title">
                                    <span class="symbol symbol-50 symbol-light-primary mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        {{-- <i class="las la-gas-pump fs-5x"></i> --}}
                                    </span>
                                    <h3 class="card-label">Mileage Log</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="milage_logs_chart" class="card-rounded-bottom" data-color="primary" style="height: 350px"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch card-stretch-half gutter-b" style="height: 100%">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Expense</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::Chart-->
                                <div id="expense_chart"></div>
                                <!--end::Chart-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
       
        <!--begin::Row-->
        
        <!--end::Row-->
    </div>
    <!--end::Section-->
</div>
<!--end::Content-->
@endsection
