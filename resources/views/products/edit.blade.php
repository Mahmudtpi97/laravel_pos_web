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
                <h1 class="h3 mb-4 text-gray-800"> <strong>{{$products->name }}</strong> Information Update</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route ('products.update',['product'=> $products->id] ) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-3">
                            <label for="group_id" class="col-md-4 col-form-label">Product Category: <span class="text-danger">*</span></label>
                            <div class="col-md-8">

                                <select name="cat_id" id="cat_id" class="form-control">
                                    <option value="{{$products->categories->id ?? '1'}}">{{$products->categories->title ?? 'Select Category Title'}}</option>

                                    @foreach ($categories as $key =>$cat )
                                        {{-- <optgroup label="{{$cat}}"> --}}
                                            <option value="{{$key}}">{{$cat}}</option>
                                        {{-- </optgroup> --}}

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Product Name: <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="title" id="title" placeholder="Enter Product Name" class="form-control" value="{{$products->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cost_price" class="col-sm-4 col-form-label">Cost Price:</label>
                            <div class="col-md-8">
                                <input type="text" name="cost_price" id="cost_price" placeholder="Enter Product Cost Price" class="form-control" value="{{$products->cost_price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label">Price: <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="price" id="price" placeholder="Enter Product Price" class="form-control" value="{{$products->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Description: <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <textarea name="description" id="description" placeholder="Enter Product Description" class="form-control">{{$products->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="p_image" class="col-sm-4 col-form-label">Product Image: <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="file" name="p_image" id="p_image" class="form-control" value="<img src='{{asset($products->p_image)}}'>">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label">Preview Photo</label>
                            <div class="col-md-8">
                                <img src="{{asset($products->p_image)}}" width="100px" height="100px" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Has Stocks: <span class="text-danger">*</span></label>
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

@endsection()
