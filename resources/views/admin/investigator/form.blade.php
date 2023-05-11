@extends('layouts.dashboard')
@section('content')
<div class="row mt-4 mb-4">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ !empty($investigator->id) ? 'Edit':'Add' }} Investigator</h5>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('admin.investigator.store') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">First Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="John" name="first_name" value="{{ $investigator->first_name ?? '' }}">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Last Name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Doe" name="last_name" value="{{ $investigator->last_name ?? '' }}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email</label>
            <div class="input-group input-group-merge">
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $investigator->email ?? '' }}">
              <span class="input-group-text">@gmail.com</span>
            </div>
            <div class="form-text"> You can use letters, numbers &amp; periods </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <input type="hidden"  name="role" value="3">
          <input type="hidden"  name="id" value="{{ $investigator->id ?? '' }}">
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">Role</label>
            <input type="text" class="form-control" value="Investigator" disabled>
          </div>
          <button type="submit" class="btn btn-primary">{{ !empty($investigator->id) ? 'Update' : 'Submit' }}</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
@endsection
