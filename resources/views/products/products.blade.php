@extends('layouts.app')

@section('content')



 {{-- <h5>{{$products->title}} aa</h5> --}}

<div class="row clearfix page_header mb-3">
    <div class="col-md-6">
        <h2> All Product </h2>

    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-info" href="{{ url('products/create') }}"> <i class="fa fa-plus"></i> Add New Product </a>
    </div>
</div>



<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Product list</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Total Price</th>
                <th>Image</th>
                <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->categories->title ?? 'Category Unavail!'}}</td>
                            <td>{{$product->title}}</td>
                            @php $totlaprice = ((int)$product->cost_price + (int)$product->price);@endphp
                            <td>{{$totlaprice}}Tk</td>
                            <td><img src="{{asset($product->p_image)}}"></td>
                            <td >
                                <form action="{{url('products/'.$product->id)}}" method="POST">
                                    <a href="{{route('products.show',['product' =>$product->id] ) }}" class="btn btn-primary mb-1"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('products.edit',['product' =>$product->id] ) }}" class="btn btn-success mb-1"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are You Sure Delete This Product') " type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                @endforeach

            </tbody>
        </table>
      </div>
    </div>
  </div>
@stop


