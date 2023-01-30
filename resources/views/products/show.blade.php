@extends('layouts.app')
@section('content')

<div class="row clearfix page_header mb-3">
    <div class="col-md-6">
        <h3 class="h3 mb-4 text-gray-800"> <strong>{{$products->title}}</strong> Others Information</h3>
    </div>
</div>

<div class="card-body shadow p-4 col-md-8">
    <div class="table-responsive">
      <table class="table table-bordered " width="100%" cellspacing="0">
        <tbody>
          <tr>
            <th>Price:</th>
            <td>{{$products->price}}</td>
          </tr>
          <tr>
            <th>Cost Price:</th>
            <td>{{$products->cost_price}}</td>
          </tr>
          <tr>
            <th>Description:</th>
            <td>{{$products->description}}</td>
          </tr>
          {{-- <tr>
            <th>Photo:</th>
            <td><img src="{{asset($products->p_image)}}" alt="profile_photo"></td>
          </tr> --}}
        </tbody>
      </table>
      <div class="col-md-6 mt-3">
        <a class="btn btn-danger" href="{{ url('products') }}"> <i class="fa fa-arrow-left mr-1"></i> Back to Product</a>
    </div>
    </div>
  </div>

@stop
