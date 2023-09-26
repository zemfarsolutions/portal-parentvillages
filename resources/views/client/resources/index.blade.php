@extends('layouts.client..app')

@section('title', 'Resources')

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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Resource Management</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/client/resources/" class="text-muted">Resources</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Todo Files-->
            <div class="d-flex flex-row">
                <!--begin::List-->
                <div class="flex-row-fluid d-flex flex-column ml-lg-8">
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Row-->
                        <div class="row">
                            @foreach ($records as $record)
                                <!--begin::Col-->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b card-stretch">
                                        <div class="card-header border-0">
                                            <h3 class="card-title"></h3>
                                            <div class="card-toolbar">
                                                {{-- <div class="dropdown dropdown-inline" data-toggle="tooltip"
                                                    title="Quick actions" data-placement="left">
                                                    <a href="#"
                                                        class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ki ki-bold-more-hor"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                        <!--begin::Navigation-->
                                                        <ul class="navi navi-hover py-5">

                                                            <li class="navi-item">
                                                                <a href="/resources/{{ $record->id }}" class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="flaticon2-file"></i>
                                                                    </span>
                                                                    <span class="navi-text">View File</span>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                        <!--end::Navigation-->
                                                    </div>
                                                </div> --}}
                                                {{-- <a href="{{ $record->path }}"
                                                    class="btn btn-secondary font-weight-bold btn-sm float-right"
                                                    target="_blank">
                                                    <span class="svg-icon" style="margin: 0">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="30px"
                                                            height="30px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path
                                                                    d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </a> --}}
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="d-flex flex-column align-items-center">
                                                @if (pathinfo($record->path, PATHINFO_EXTENSION) === 'pdf')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/download.png" />
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'png')
                                                <a href="{{ $record->path }}" target="_blank">
                                                    <img alt="" class="max-h-65px"
                                                        src="/assets/media/extensions/png.png" />
                                                </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'docx' || pathinfo($record->path, PATHINFO_EXTENSION) === 'docx')
                                                <a href="{{ $record->path }}" target="_blank">
                                                    <img alt="" class="max-h-65px"
                                                        src="/assets/media/extensions/docx.png" />\
                                                </a>
                                                
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'jpg' || pathinfo($record->path, PATHINFO_EXTENSION) === 'jpeg')
                                                <a href="{{ $record->path }}" target="_blank">
                                                    <img alt="" class="max-h-65px"
                                                        src="/assets/media/extensions/png.png" />
                                                </a>

                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'zip')
                                                <a href="{{ $record->path }}" target="_blank">
                                                    <img alt="" class="max-h-65px"
                                                        src="/assets/media/extensions/zip.png" />
                                                </a>

                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'psd')
                                                <a href="{{ $record->path }}" target="_blank">
                                                    <img alt="" class="max-h-65px"
                                                        src="/assets/media/extensions/psd.png" />
                                                </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'xml')
                                                <a href="{{ $record->path }}" target="_blank">
                                                    <img alt="" class="max-h-65px"
                                                        src="/assets/media/extensions/xml.png" />
                                                </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'html')
                                                <a href="{{ $record->path }}" target="_blank">
                                                    <img alt="" class="max-h-65px"
                                                        src="/assets/media/extensions/html.png" />
                                                </a>
                                                @endif
                                                <!--begin: Title-->
                                                <p class="text-dark-75 font-weight-bold mt-15 font-size-lg">
                                                    {{ $record->name . '.' . pathinfo($record->path, PATHINFO_EXTENSION) }}
                                                </p>
                                                <!--end: Tite-->
                                            </div>
                                            {{-- <form action="/client{{ $record->path }}" method=""></form> --}}
                                        </div>
                                    </div>
                                    <!--end:: Card-->
                                </div>
                                <!--end::Col-->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--end::List-->
            </div>
            <!--end::Todo Files-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
