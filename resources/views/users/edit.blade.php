@extends('layouts.app')
@section('content')

	<div class="card shadow p-3">
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
                <h1 class="h3 mb-4 text-gray-800"> <strong>{{$users->name }}</strong> Information Update</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route ('users.update',['user'=> $users->id] ) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-3">
                            <label for="group_id" class="col-md-3 col-form-label">Group Title: </label>
                            <div class="col-sm-9">
                                <select name="group_id" id="group_id" class="form-control">
                                       <option value="{{$users->usersGroup->id}}">{{$users->usersGroup->title}}</option>
                                    @foreach ($groups as $key =>$group )
                                        <option value="{{$key}}">{{$group}}</option>
                                   @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-3 col-form-label">Name: </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" class="form-control" value="{{$users->name}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" id="email" class="form-control" value="{{$users->email}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="phone" class="col-md-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" id="phone" class="form-control" value="{{$users->phone}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="address" class="col-md-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" id="address" class="form-control" value="{{$users->address}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="birthday" class="col-md-3 col-form-label">Birthday</label>
                            <div class="col-sm-9">
                                <input type="date" name="birthday" id="birthday" class="form-control" value="{{$users->birthday}}">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="photo" class="col-md-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input type="file" name="photo" id="photo" class="form-control" value="{{$users->photo}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label">Preview Photo</label>
                            <div class="col-sm-8">
                                <img src="{{asset($users->photo)}}" width="100px" height="100px" >
                            </div>
                        </div>
                        <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                                <a href="{{url('users')}}" class="btn btn-danger float-right"><i class="fa fa-arrow-left mr-1"></i>Back to Users</a>
                        </div>
                    </form>
                </div>
            </div>
	   </div>
	</div>

@endsection()
