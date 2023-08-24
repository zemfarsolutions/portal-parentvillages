@extends('layouts.client.app')

@section('title', 'Scholarships')

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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Scholarship Form</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a href="/client/scholarships" class="btn btn-light-primary font-weight-bolder btn-sm">Go Back</a>
                <!--end::Actions-->
            </div>
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
                            <h3 class="card-title">Scholarship Form</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="/client/scholarships/" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="scholarship_id" value="{{$scholarship->id}}">
                            <div class="card-body">
                                <!-- Applicant Details Start  -->
                                <div class="d-flex justify-content-between pt-1">
                                    <h6 class="display-7 font-weight-bold mb-5">Applicant Detail</h6>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Name:</label>
                                        <input name="name" type="text" class="form-control" placeholder="Enter full name" />
                                        <span class="form-text text-muted">Please enter your full name</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Email:</label>
                                        <input name="email" type="email" class="form-control" placeholder="Enter your email address" />
                                        <span class="form-text text-muted">Please enter your email address</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Date</label>
                                        <input name="date" type="date" class="form-control">
                                        <span class="form-text text-muted">Please enter date</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Address:</label>
                                        <input name="address" type="text" class="form-control" placeholder="Enter your street address" />
                                        <span class="form-text text-muted">Please enter your street address</span>
                                    </div>
                                </div>                            
                                <div class="form-group row">   
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Appartment / Unit #:</label>
                                        <input name="appartment" type="text" class="form-control" placeholder="Enter your appartment" />
                                        <span class="form-text text-muted">Please enter your appartment / unit #</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">City:</label>
                                        <input name="city" type="text" class="form-control" placeholder="Enter your city" />
                                        <span class="form-text text-muted">Please enter your city</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">State / Province</label>
                                        <input name="state" type="text" class="form-control" placeholder="Enter state / province" />
                                        <span class="form-text text-muted">Please enter your state / province</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Postal / Zip Code</label>
                                        <input name="postal_code" type="text" class="form-control" placeholder="Enter postal / zip code" />
                                        <span class="form-text text-muted">Please enter your postal / zip Code</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Contact Number:</label>
                                        <input name="phone" type="text" class="form-control" placeholder="Enter contact number" />
                                        <span class="form-text text-muted">Please enter your contact number</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Upload your Award Letter</label>
                                        <input name="award_letter" type="file" class="form-control"/>
                                        <span class="form-text text-muted">Please upload award letter</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Upload your Transcript Letter</label>
                                        <input name="transcript_letter" type="file" class="form-control"/>
                                        <span class="form-text text-muted">Please upload transcript letter</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Current High School</label>
                                        <input name="high_school" type="text" class="form-control" placeholder="Enter current high school" />
                                        <span class="form-text text-muted">Please enter current high school</span>
                                    </div>
                                </div>
                                <div class="form-group row"> 
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">What College/University do you plan to attend in Fall 2023?</label>
                                        <input name="plan" type="text" class="form-control" placeholder="Enter plan" />
                                        <span class="form-text text-muted">Please enter your plan to attend in Fall 2023?</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Upload your College/University Acceptance Letter</label>
                                        <input name="acceptance_letter" type="file" class="form-control"/>
                                        <span class="form-text text-muted">Please upload acceptance letter</span>
                                    </div>
                                </div>
                                <!-- Applicant Details End  -->

                                <!-- Guardians One Details Start  -->
                                <div class="d-flex justify-content-between pt-5">
                                    <h6 class="display-7 font-weight-bold mb-5">First Guardians Detail</h6>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Full Name :</label>
                                        <input name="guardian_one['name']" type="text" class="form-control" placeholder="Enter full name" />
                                        <span class="form-text text-muted">Please enter your full name</span>
                                    </div>
                                    <div class="col-lg-6">  
                                        <label class="font-weight-bold">Guardian's Email:</label>
                                        <input name="guardian_one['email']" type="email" class="form-control" placeholder="Enter email address" />
                                        <span class="form-text text-muted">Please enter your email address</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Contact Number :</label>
                                        <input name="guardian_one['phone']" type="text" class="form-control" placeholder="Enter your contact number" />
                                        <span class="form-text text-muted">Please enter your contact number</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Address:</label>
                                        <input name="guardian_one['address']" type="text" class="form-control" placeholder="Enter your address" />
                                        <span class="form-text text-muted">Please enter your complete address</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Highest level of :</label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" value="High School Diploma" name="guardian_one['high_school_diploma']" />
                                                <span></span>High School Diploma
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Associate Degree" name="guardian_one['associate_degree']" />
                                                <span></span>Associate Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Bachelor Degree" name="guardian_one['bechelor_degree']" />
                                                <span></span>Bachelor Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Master Degree" name="guardian_one['master_degree']" />
                                                <span></span>Master Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Doctoral Degree" name="guardian_one['doctoral_degree']" />
                                                <span></span>Doctoral Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="None" name="guardian_one['none']" />
                                                <span></span>None</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Guardians One Details End  -->

                                <!-- Guardians Two Details Start  -->
                                <div class="d-flex justify-content-between pt-5">
                                    <h6 class="display-7 font-weight-bold mb-5">Second Guardians Detail</h6>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Full Name :</label>
                                        <input name="guardian_two['name']" type="text" class="form-control" placeholder="Enter full name" />
                                        <span class="form-text text-muted">Please enter your full name</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Email:</label>
                                        <input name="guardian_two['email']" type="email" class="form-control" placeholder="Enter email address" />
                                        <span class="form-text text-muted">Please enter your email address</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Contact Number :</label>
                                        <input name="guardian_two['phone']" type="text" class="form-control" placeholder="Enter your contact number" />
                                        <span class="form-text text-muted">Please enter your contact number</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Address:</label>
                                        <input name="guardian_two['address']" type="text" class="form-control" placeholder="Enter your address" />
                                        <span class="form-text text-muted">Please enter your complete address</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Guardian's Highest level of :</label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" value="High School Diploma" name="guardian_two['high_school_diploma']" />
                                                <span></span>High School Diploma
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Associate Degree" name="guardian_two['associate_degree']" />
                                                <span></span>Associate Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Bachelor Degree" name="guardian_two['bachelor_degree']" />
                                                <span></span>Bachelor Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Master Degree" name="guardian_two['master_degree']" />
                                                <span></span>Master Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="Doctoral Degree" name="guardian_two['doctoral_degree']" />
                                                <span></span>Doctoral Degree</label>
                                            <label class="checkbox">
                                                <input type="checkbox" value="None" name="guardian_two['none']" />
                                                <span></span>None</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Guardians Two Details End  -->


                                <!-- Reference One Details Start  -->
                                <div class="d-flex justify-content-between pt-5">
                                    <h6 class="display-7 font-weight-bold mb-5">First Reference Detail</h6>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Full Name :</label>
                                        <input name="reference_one['name']" type="text" class="form-control" placeholder="Enter full name" />
                                        <span class="form-text text-muted">Please enter your full name</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Email:</label>
                                        <input name="reference_one['email']" type="email" class="form-control" placeholder="Enter email address" />
                                        <span class="form-text text-muted">Please enter your email address</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Contact Number :</label>
                                        <input name="reference_one['phone']" type="text" class="form-control" placeholder="Enter your contact number" />
                                        <span class="form-text text-muted">Please enter your contact number</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Relationship Length  :</label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="radio" value="1-2 years" name="reference_one['relation_length']" />
                                                <span></span>1-2 years
                                            </label>
                                            <label class="checkbox">
                                                <input type="radio" value="3-5 years" name="reference_one['relation_length']" />
                                                <span></span>3-5 years</label>
                                            <label class="checkbox">
                                                <input type="radio" value="6-10 years" name="reference_one['relation_length']" />
                                                <span></span>6-10 years</label>
                                            <label class="checkbox">
                                                <input type="radio" value="10+ years" name="reference_one['relation_length']" />
                                                <span></span>10+ years</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference Letter</label>
                                        <input name="reference_one['reference_letter']" type="file" class="form-control"/>
                                        <span class="form-text text-muted">Please upload reference letter</span>
                                    </div>   
                                </div>
                                <!-- Reference One Details Start  -->

                                <!-- Reference Two Details Start  -->
                                <div class="d-flex justify-content-between pt-5">
                                    <h6 class="display-7 font-weight-bold mb-5">Second Reference Detail</h6>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Full Name :</label>
                                        <input name="reference_two['name']" type="text" class="form-control" placeholder="Enter full name" />
                                        <span class="form-text text-muted">Please enter your full name</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Email:</label>
                                        <input name="reference_two['email']" type="email" class="form-control" placeholder="Enter email address" />
                                        <span class="form-text text-muted">Please enter your email address</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Contact Number :</label>
                                        <input name="reference_two['phone']" type="text" class="form-control" placeholder="Enter your contact number" />
                                        <span class="form-text text-muted">Please enter your contact number</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference's Relationship Length  :</label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="radio" value="1-2 years" name="reference_two['relation_length']" />
                                                <span></span>1-2 years
                                            </label>
                                            <label class="checkbox">
                                                <input type="radio" value="3-5 years" name="reference_two['relation_length']" />
                                                <span></span>3-5 years</label>
                                            <label class="checkbox">
                                                <input type="radio" value="6-10 years" name="reference_two['relation_length']" />
                                                <span></span>6-10 years</label>
                                            <label class="checkbox">
                                                <input type="radio" value="10+ years" name="reference_two['relation_length']" />
                                                <span></span>10+ years</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">    
                                    <div class="col-lg-6">
                                        <label class="font-weight-bold">Reference Letter</label>
                                        <input name="reference_two['reference_letter']" type="file" class="form-control"/>
                                        <span class="form-text text-muted">Please upload reference letter</span>
                                    </div>    
                                </div>
                                <!-- Reference Two Details End  -->

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
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
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection