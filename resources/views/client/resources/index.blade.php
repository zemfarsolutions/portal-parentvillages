@extends('layouts.client.app')

@section('title', 'Appointments')

@section('section')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Resources</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $total_resources }} Total</span>
                    <form class="ml-5">
                    </form>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="../../../.html" class=""></a>
                <!--end::Button-->
                <!--begin::Button-->

                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Resources Management
                        </h3>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="/client/resources" class="text-muted">Resources</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    @foreach ($records as $record)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b card-stretch">
                                <div class="card-header border-0">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center">
                                        <!--begin: Icon-->
                                        <img alt="" class="max-h-65px"
                                            src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/pdf.svg" />
                                        <!--end: Icon-->
                                        <!--begin: Tite-->
                                        <a href="http://127.0.0.1:8080{{ $record->path }}" target="_blank"
                                            class="text-dark-75 font-weight-bold mt-15 font-size-lg">{{ $record->name }}.pdf</a>
                                        <!--end: Tite-->
                                    </div>
                                </div>
                            </div>
                            <!--end:: Card-->
                        </div>
                    @endforeach
                    <!--begin::Col-->
                    <!--end::Col-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('scripts')
    <script src="/assets/js/pages/appointments/index.js"></script>
@endsection
