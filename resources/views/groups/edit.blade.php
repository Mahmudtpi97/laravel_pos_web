@extends('layouts.app')
@section('content')

	<div class="card shadow p-3 col-md-8 m-auto">
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
                <h1 class="h3 mb-4 text-gray-800">Group <strong>{{$groups->title }}</strong> Title Edit</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route ('groups.update',['group'=> $groups->id] ) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-3">
                            <label for="title" class="col-md-3 col-form-label">Title: </label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" value="{{$groups->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                                <a href="{{url('groups')}}" class="btn btn-danger float-right"><i class="fa fa-arrow-left mr-1"></i>Back to Group</a>
                        </div>
                    </form>
                </div>
            </div>
	   </div>
	</div>

@endsection()
