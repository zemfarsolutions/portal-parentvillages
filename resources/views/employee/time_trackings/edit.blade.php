@extends('layouts.employee.app')

@section('title', 'Time Tracking')

@section('section')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Time Tracking</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-muted">Edit Record</a>
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
                <a href="/employee/time-tracking" class="btn btn-light-primary font-weight-bolder btn-sm">Go Back</a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Record</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="/employee/time-tracking/{{ $time_tracking->id }}">

                            @method('PUT')
                            @csrf
                            <?php
                            $date = date_create($time_tracking->date);
                            ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Date:</label>
                                        <input name="date" value="{{ date_format($date, 'm/d/Y') }}" type="text"
                                            class="form-control" id="kt_datepicker_1" readonly="readonly"
                                            placeholder="Select date" />
                                        <span class="form-text text-muted">Please select the date</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Number Of Hours:</label>
                                        <input maxlength="9" required name="number_of_hours"
                                            value="{{ $time_tracking->number_of_hours }}" type="number"
                                            class="form-control" placeholder="Enter contact number" />
                                        <span class="form-text text-muted">Please enter total number of hours</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="typeSelect1">Type select</label>
                                            <select required name="type" class="form-control" id="typeSelect1">
                                                <option {{ $time_tracking->type == 'event' ? 'selected' : null }}>Event
                                                </option>
                                                <option {{ $time_tracking->type == 'place' ? 'selected' : null }}>Place
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Description:</label>
                                        <textarea required name="description" class="form-control" id="exampleTextarea" rows="1">
                                            {{ $time_tracking->description }}
                                        </textarea>
                                        <span class="form-text text-muted">Please enter description</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12 text-danger">
                                        @error('date')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                        <a href="/employee/time-tracking" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="/assets/js/pages/crud/forms/widgets/bootstrap-datepicker9cd7.js?v=7.1.5"></script>
@endsection
