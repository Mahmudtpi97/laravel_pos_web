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
 <div class="card shadow mb-4 col-md-6">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="user" action="{{url('groups')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" id="title" placeholder="User Group Title" value="{{old('title')}}">
                        <small id="title" class="form-text text-muted">Title of users group.</small>
                    </div>
                        <button type="submit" class="btn btn-primary"> Submit </button>
                        <a href="{{url('groups')}}" class="btn btn-danger float-right"><i class="fa fa-arrow-left mr-1"></i>Back</a>
                </form>
            </div>
        </div>
    </div>
 </div>

@stop
