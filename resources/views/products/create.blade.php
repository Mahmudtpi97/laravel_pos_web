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

    <div class="card shadow col-md-10 p-0  mb-4 ">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">New User</h6>
        </div>

        <div class="card-body m-auto col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <form class="user" action="{{url('products')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Product Category: <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select name="cat_id" id="cat_id" class="form-control">
                                    <option value="{{old('cat_id')}}">Select Options</option>
                                    @foreach ($categories as $key => $cat)
                                        <option value="{{$key}}">{{$cat}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Product Name: <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="title" id="title" placeholder="Enter Product Name" class="form-control" value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cost_price" class="col-sm-4 col-form-label">Cost Price:</label>
                            <div class="col-md-8">
                                <input type="text" name="cost_price" id="cost_price" placeholder="Enter Product Cost Price" class="form-control" value="{{old('cost_price')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label">Price: </label>
                            <div class="col-md-8">
                                <input type="text" name="price" id="price" placeholder="Enter Product Price" class="form-control" value="{{old('price')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Description: <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <textarea name="description" id="description" placeholder="Enter Product Description" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="p_image" class="col-sm-4 col-form-label">Product Image: </label>
                            <div class="col-md-8">
                                <input type="file" name="p_image" id="p_image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Has Stocks: </label>
                            <div class="col-md-3">
                                <select name="has_stock" id="has_stock" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"> Submit </button>
                        <a href="{{url('products')}}" class="btn btn-danger float-right"><i class="fa fa-arrow-left mr-1"></i>Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
