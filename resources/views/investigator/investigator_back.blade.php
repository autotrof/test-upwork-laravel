@extends('layouts.dashboard')
@section('content')
    <div class="row mt-4 mb-4">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Investigator's Profile</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('submit_investigator_profile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                            </div>
                            @error('phone')
                            <span role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">Service Lines</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>Investigation Types</th>
                                            <th>Case Experience</th>
                                            <th>Years Experience</th>
                                            <th>Hourly Rate</th>
                                            <th>Travel Rate</th>
                                            <th>Milage Rate</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Surveillance <input class="form-check-input" type="checkbox" value="surveillance" name="investigation_type[0][type]" checked></td>
                                            <td>
                                                <select class="form-select" name="investigation_type[0][case_experience]">
                                                    <option value="0">--select--</option>
                                                    <option value="1">Under 50</option>
                                                    <option value="2">50-499</option>
                                                    <option value="3">500+</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[0][years_experience]" >
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[0][hourly_rate]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[0][travel_rate]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[0][milage_rate]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Statements <input class="form-check-input" type="checkbox" value="statements" name="investigation_type[1][type]" checked></td>
                                            <td>
                                                <select class="form-select" name="investigation_type[1][case_experience]">
                                                    <option>--select--</option>
                                                    <option value="1">Under 50</option>
                                                    <option value="2">50-499</option>
                                                    <option value="3">500+</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[1][years_experience]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[1][hourly_rate]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[1][travel_rate]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[1][milage_rate]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Misc <input class="form-check-input" type="checkbox" value="misc" name="investigation_type[2][type]" checked></td>
                                            <td>
                                                <select class="form-select" name="investigation_type[2][case_experience]">
                                                    <option value="0">--select--</option>
                                                    <option value="1">Under 50</option>
                                                    <option value="2">50-499</option>
                                                    <option value="3">500+</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[2][years_experience]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[2][hourly_rate]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[2][travel_rate]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="investigation_type[2][milage_rate]">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">Equipment</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="equipment">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>Camera Type</th>
                                            <th>Dashcam</th>
                                            <th>Convert Video</th>
                                            <th>Camera Model Number</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="camera_type">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" value="1" name="dashcam">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" value="1" name="convert_video">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="camera_model_number">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">Licensing</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>State</th>
                                            <th>License Number</th>
                                            <th>Expiration date</th>
                                            <th>Insurance</th>
                                            <th>Bonded</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="licencing_body">
                                        <tr class="licence_line">
                                            <td>
                                                <select class="form-select investigator_profile_state" name="licencing[0][state]">
                                                    <option>--select--</option>
                                                    <option value="1">California</option>
                                                    <option value="2">Texas</option>
                                                    <option value="3">Florida</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="licencing[0][license_number]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="date" name="licencing[0][expiration_date]">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" value="1" name="licencing[0][insurance]">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" value="1" name="licencing[0][bonded]">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="add_licence">Add+</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">Work Vehicle</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>Year</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Picture</th>
                                            <th>Insurance Company Name</th>
                                            <th>Policy Number</th>
                                            <th>Expiration Date</th>
                                            <th>Upload Proof of Insurance</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="vehicle_body">
                                        <tr class="vehicle_line">
                                            <td>
                                                <input type="text" class="form-control investigator_profile_vechile_year" name="work_vehicle[0][year]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control investigator_profile_vechile_make" name="work_vehicle[0][make]">
                                            </td>
                                            <td>
                                                <input class="form-control investigator_profile_vechile_model" type="text" name="work_vehicle[0][model]">
                                            </td>
                                            <td>
                                                <input class="form-control investigator_profile_picture" type="file" name="work_vehicle[0][picture]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="work_vehicle[0][insurance_company_name]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="work_vehicle[0][policy_number]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="date" name="work_vehicle[0][expiration_date]">
                                            </td>
                                            <td>
                                                <input class="form-control investigator_profile_proof_of_insurance" type="file" name="work_vehicle[0][proof_of_insurance]">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="add_vehicle">Add+</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">Languages Spoken</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>Language Spoken</th>
                                            <th>Fluency Level</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="language_body">
                                        <tr class="language_line">
                                            <td>
                                                <select id="defaultSelect" class="form-select" name="languages_spoken[0][language]">
                                                    <option>--select--</option>
                                                    <option value="1">English</option>
                                                    <option value="2">Spanish</option>
                                                    <option value="3">French</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="defaultSelect" class="form-select" name="languages_spoken[0][fluency]">
                                                    <option>--select--</option>
                                                    <option value="1">Beginner</option>
                                                    <option value="2">Moderate</option>
                                                    <option value="3">Fluent</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="add_language">Add+</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">Documents</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>DL</th>
                                            <th>ID/PassPort Photo</th>
                                            <th>SSN</th>
                                            <th>Birth Certificate</th>
                                            <th>Form 19</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control investigator_profile_document_dl" type="file" name="document_dl">
                                            </td>
                                            <td>
                                                <input class="form-control investigator_profile_document_id" type="file" name="document_id">
                                            </td>
                                            <td>
                                                <input class="form-control investigator_profile_document_ssn" type="file" name="document_ssn">
                                            </td>
                                            <td>
                                                <input class="form-control investigator_profile_document_birth_certificate" type="file" name="document_birth_certificate">
                                            </td>
                                            <td>
                                                <input class="form-control investigator_profile_document_form_19" type="file" name="document_form_19">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">General availability and notice for lead time?</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>Days</th>
                                            <th>Hours</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="availability_days">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="availability_hours">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="card">
                                <h5 class="card-header">Availability</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>Distance - You willing to travel to work a case? (in miles)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="availability_distance">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">{{isset($investigator) && !empty($investigator->id) ? 'Update':'Submit'}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection

@section('js')
    <script>
        $('#add_licence').click(function () {
            let index= $('.licence_line').length;
            let licence_line= '<tr class="licence_line">' +
                '<td > ' +
                '<select class="form-select investigator_profile_state" name="licencing['+index+'][state]"> ' +
                '<option>--select--</option> ' +
                '<option value="1">California</option> ' +
                '<option value="2">Texas</option> ' +
                '<option value="3">Florida</option> ' +
                '</select> ' +
                '</td> ' +
                '<td> ' +
                '<input type="text" class="form-control" name="licencing['+index+'][license_number]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-control" type="date" name="licencing['+index+'][expiration_date]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-check-input" type="checkbox" value="1" name="licencing['+index+'][insurance]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-check-input" type="checkbox" value="1" name="licencing['+index+'][bonded]"> ' +
                '</td> ' +
                '<td> ' +
                '<button type="button" class="btn btn-danger remove_licence">Remove</button> ' +
                '</td> ' +
                '</tr>';
            $("#licencing_body").append(licence_line);
        })

        $('body').on('click', '.remove_licence, .remove_vehicle, .remove_language', function () {
            $(this).parent().parent().remove();
        })


        $('#add_vehicle').click(function () {
            let index= $('.vehicle_line').length;
            let vehicle_line= '<tr class="vehicle_line">' +
                '<td> ' +
                '<input type="text" class="form-control investigator_profile_vechile_year" name="work_vehicle['+index+'][year]">' +
                '</td> ' +
                '<td> ' +
                '<input type="text" class="form-control investigator_profile_vechile_make" name="work_vehicle['+index+'][make]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-control investigator_profile_vechile_model" type="text" name="work_vehicle['+index+'][model]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-control investigator_profile_picture" type="file" name="work_vehicle['+index+'][picture]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-control" type="text" name="work_vehicle['+index+'][insurance_company_name]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-control" type="text" name="work_vehicle['+index+'][policy_number]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-control" type="date" name="work_vehicle['+index+'][expiration_date]"> ' +
                '</td> ' +
                '<td> ' +
                '<input class="form-control investigator_profile_proof_of_insurance" type="file" name="work_vehicle['+index+'][proof_of_insurance]"> ' +
                '</td> ' +
                '<td> ' +
                '<button type="button" class="btn btn-danger remove_vehicle">Remove</button> ' +
                '</td> ' +
                '</tr>';
            $("#vehicle_body").append(vehicle_line);
        })

        $('#add_language').click(function () {
            let index= $('.language_line').length;
            let language_line= '<tr class="language_line"> ' +
                '<td> ' +
                '<select id="defaultSelect" class="form-select" name="languages_spoken['+index+'][language]"> ' +
                '<option>--select--</option> ' +
                '<option value="1">English</option> ' +
                '<option value="2">Spanish</option> ' +
                '<option value="3">French</option> ' +
                '</select> ' +
                '</td> ' +
                '<td> ' +
                '<select id="defaultSelect" class="form-select" name="languages_spoken['+index+'][fluency]"> ' +
                '<option>--select--</option> ' +
                '<option value="1">Beginner</option> ' +
                '<option value="2">Moderate</option> ' +
                '<option value="3">Fluent</option> ' +
                '</select> ' +
                '</td> ' +
                '<td> ' +
                '<button type="button" class="btn btn-danger remove_language">Remove</button> ' +
                '</td> ' +
                '</tr>';
            $("#language_body").append(language_line);
        })
    </script>
@stop
