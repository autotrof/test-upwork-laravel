@extends('layouts.dashboard')
@section('content')
<div class="card">
  <h5 class="card-header">Manage HR's</h5>
  <a href="{{ route('admin.hr.create') }}" class="float-right"><button type="button" class="btn btn-primary" style="float:right;margin-right: 26px;">Add HR</button></a>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hrs as $key=>$value)
        <tr>
          <td>{{ $key+1 }}</th>
          <td>{{ $value->first_name }}</td>
          <td>{{ $value->last_name }}</td>
          <td>{{ $value->email }}</td>
          <td>
            <a href="{{ route('admin.hr.edit', ['hr' => $value]) }}">Edit</a> |
            <form style="display: inline-block;padding: 0" method="post" action="{{route('admin.hr.destroy', ['hr' => $value])}}" onsubmit="return confirm('Are you sure want to delete?');">
                @method('DELETE')
                @csrf
                <button class="btn-link" type="submit">Delete</button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

