@extends('layouts.client.app')

@section('title', 'Profile')

@section('section')
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
            </div>
           
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="form" action="/client/profile" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control form-control-lg form-control-solid mb-2" name="current_password" placeholder="Current password" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control form-control-lg form-control-solid" name="new_password" placeholder="New password" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control form-control-lg form-control-solid" name="confirm_password" id="confirm_password" placeholder="Verify password" />
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
@endsection



