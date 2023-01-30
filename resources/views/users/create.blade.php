@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row clearfix page_header mb-3">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Create a New User</h1>
    </div>
</div>

 <div class="card shadow col-md-12 p-0  mb-4 ">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">New User</h6>
    </div>
    <div class="card-body m-auto col-md-10">
        <div class="row">
            <div class="col-md-12">
                <form class="user" action="{{url('users')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="group_id" class="col-sm-2 col-form-label">Users Group<span class="text-danger">*</span> </label>
                        <div class="col-sm-10">

                            <select name="group_id" id="group_id" class="form-control">
                                <option value="#">Select Group</option>

                                    @foreach ($groups as $group)
                                        <option value="{{$group->id}}">{{ $group->title}}</option>
                                    @endforeach

                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span> </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter User Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter User Phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Birthday </label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Y-M-D">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address </label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter User Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Photo </label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="photo" id="photo" >
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary " value="Submit">
                        <a href="{{url('users')}}" class="btn btn-danger float-right"><i class="fa fa-arrow-left mr-1"></i>Back to Users</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
 </div>

@stop
