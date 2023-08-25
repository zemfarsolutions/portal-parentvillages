@extends('layouts.client.app')

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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-muted">Dashboard</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-right">
                <!--begin::Actions-->
                <a href="/client/intakes/create" class="btn btn-light-primary font-weight-bolder btn-sm mx-1">Intake
                    Form</a>
                <a href="/client/appointments/create"
                    class="btn btn-light-primary font-weight-bolder btn-sm mx-1">Appointment Form</a>
                <a href="/client/scholarships" class="btn btn-light-primary font-weight-bolder btn-sm mx-1">Scholarships</a>
                <!--end::Actions-->
            </div>

            <!--end::Toolbar-->
        </div>
    </div>


@endsection
