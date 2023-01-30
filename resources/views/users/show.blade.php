@extends('layouts.user_layout')
@section('user_content')


<div class="card shadow p-4 mb-4 ">
    <div class="card-header p-0 pb-2">
        <h6 class="m-0 font-weight-bold text-primary"> <strong>{{$users->name}}</strong> Others Information</h6>
    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <tbody>
            <tr>
                <th>Address:</th>
                <td>{{$users->address}}</td>
            </tr>
            <tr>
                <th>Birthday:</th>
                <td>{{$users->birthday }}  </td>
            </tr>
            <tr>
                <th>Adding Date:</th>
                <td>{{$users->updated_at}}</td>
            </tr>
            <tr>
                <th>Photo:</th>
                <td><img src="{{asset($users->photo)}}" alt="profile_photo"></td>
            </tr>
            </tbody>
        </table>
        <div class="col-md-6">
            <a class="btn btn-danger btn-sm" href="{{ url('users') }}"> <i class="fa fa-arrow-left mr-1"></i> Back to Users</a>
        </div>
    </div>

</div>


@stop
