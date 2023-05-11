@extends('layouts.dashboard')
@section('content')
<div class="row mt-4 mb-4 mx-0">
   <div class="col-md-1"></div>
   <div class="col-md-10">
      <div class="card mb-4">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Investigator's Profile</h5>
         </div>
         <div class="card-body">
            <form method="post" action="/investigator/profile/submit" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Email</label>
                        <div class="input-group input-group-merge">
                           <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Phone Number</label>
                        <div class="input-group input-group-merge">
                           <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{isset(auth()->user()->phone) ? auth()->user()->phone : old('phone')}}">
                        </div>
                        @error('phone')
                        <span role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{isset(auth()->user()->address) ? auth()->user()->address : old('address')}}">
                     </div>
                     @error('address')
                     <span role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Address 1</label>
                        <input type="text" class="form-control" name="address_1" value="{{isset(auth()->user()->address_1) ? auth()->user()->address_1 : old('address_1')}}">
                     </div>
                  </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                    <div class="mb-3">
                       <label class="form-label" for="basic-default-email">City</label>
                       <div class="input-group input-group-merge">
                          <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{isset(auth()->user()->city) ? auth()->user()->city : old('city')}}">
                       </div>
                       @error('city')
                       <span role="alert">
                       <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                    </div>
                 </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-email">State</label>
                        <div class="input-group input-group-merge">
                          <select class="form-select @error('address') is-invalid @enderror" name="state">
                            @if(isset($states))
                             @foreach($states as $state)
                              <option value="{{$state->id}}" {{isset(auth()->user()->state_id) && (auth()->user()->state_id == $state->id || old ('state') == $state->id ) ? 'selected' :'' }}>{{$state->code}}</option>
                             @endforeach
                            @endif
                           </select>
                        </div>
                     </div>
                     @error('state')
                     <span role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Country</label>
                        <div class="input-group input-group-merge">
                          <select id="defaultSelect" class="form-control @error('country') is-invalid @enderror" name="country">
                            <option selected="selected" value="1">USA</option>
                           </select>
                        </div>
                     </div>
                     @error('country')
                     <span role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Zip Code</label>
                        <div class="input-group input-group-merge">
                           <input type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{isset(auth()->user()->zipcode) ? auth()->user()->zipcode : old('zipcode')}}">
                        </div>
                        @error('zipcode')
                        <span role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
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
                     <h5 class="card-header">Ratings & Reviews</h5>
                     <div class="table-responsive text-nowrap">
                        <table class="table">
                           <thead>
                              <tr class="text-nowrap">
                                 <th>% Case you are able to capture of video of claimant</th>
                                 <th>Upload a survelance report writing Sample</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <input type="text" class="form-control" name="video_claimant_percentage">
                                 </td>
                                 <td>
                                    <input class="form-control investigator_profile_document_form_19" type="file" name="survelance_report">
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
                        <table class="table">
                           <thead>
                              <tr class="text-nowrap">
                                 <th>Camera Type</th>
                                 <th>Camera Model Number</th>
                                 <th>Dashcam</th>
                                 <th>Convert Video</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <input type="text" class="form-control" name="camera_type">
                                 </td>
                                 <td>
                                    <input type="text" class="form-control" name="camera_model_number">
                                 </td>
                                 <td>
                                    <input class="form-check-input" type="checkbox" value="1" name="dashcam">
                                 </td>
                                 <td>
                                    <input class="form-check-input" type="checkbox" value="1" name="convert_video">
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
                        <table class="table licensing">
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
                           <tbody>
                              <tr>
                                 <td>
                                    <select class="form-select investigator_profile_state">
                                       <option>--select--</option>
                                       <option value="1">California</option>
                                       <option value="2">Texas</option>
                                       <option value="3">Florida</option>
                                    </select>
                                 </td>
                                 <td>
                                    <input type="text" class="form-control" name="license_number">
                                 </td>
                                 <td>
                                    <input class="form-control" type="date" name="expiration_date">
                                 </td>
                                 <td>
                                    <input class="form-check-input" type="checkbox" value="1" name="insurance">
                                 </td>
                                 <td>
                                    <input class="form-check-input" type="checkbox" value="1" name="bonded">
                                 </td>
                                 <td>
                                    <button type="button" class="btn btn-primary licensing_row">Add+</button>
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
                        <table class="table workvehicle">
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
                           <tbody>
                              <tr>
                                 <td>
                                    <input type="text" class="form-control investigator_profile_vechile_year" name="year">
                                 </td>
                                 <td>
                                    <input type="text" class="form-control investigator_profile_vechile_make" name="make">
                                 </td>
                                 <td>
                                    <input class="form-control investigator_profile_vechile_model" type="text" name="model">
                                 </td>
                                 <td>
                                    <input class="form-control investigator_profile_picture" type="file" name="picture">
                                 </td>
                                 <td>
                                    <input class="form-control" type="text" name="insurance_company_name">
                                 </td>
                                 <td>
                                    <input class="form-control" type="text" name="policy_number">
                                 </td>
                                 <td>
                                    <input class="form-control" type="date" name="expiration_date">
                                 </td>
                                 <td>
                                    <input class="form-control investigator_profile_proof_of_insurance" type="file" name="proof_of_insurance">
                                 </td>
                                 <td>
                                    <button type="button" class="btn btn-primary workvehicle_row">Add+</button>
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
                        <table class="table languages">
                           <thead>
                              <tr class="text-nowrap">
                                 <th>Language Spoken</th>
                                 <th>Fluency Level</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <select id="defaultSelect" class="form-select">
                                       <option>--select--</option>
                                       <option value="1">English</option>
                                       <option value="2">Spanish</option>
                                       <option value="3">French</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select id="defaultSelect" class="form-select">
                                       <option>--select--</option>
                                       <option value="1">Beginner</option>
                                       <option value="2">Moderate</option>
                                       <option value="3">Fluent</option>
                                    </select>
                                 </td>
                                 <td>
                                    <button type="button" class="btn btn-primary languages_row">Add+</button>
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
                  <div class="card col-md-6">
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
                  <div class="card col-md-6">
                     <h5 class="card-header">Availability</h5>
                     <div class="table-responsive text-nowrap">
                        <table class="table">
                           <thead>
                              <tr class="">
                                 <th>Distance - You willing to travel to work a case? (in miles)</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <input class="form-control w-50" type="text" name="availability_distance">
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
<style type="text/css">
   .dollarIcon span {position: relative;}
.dollarIcon span:before {content: "$";z-index: 123;position: absolute;left: 10px;top: 10px;}
</style>

@endsection
