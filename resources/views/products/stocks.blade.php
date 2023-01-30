@extends('layouts.app')
@section('content')


<div class="row clearfix page_header mb-3">
    <div class="col-md-12">
        <h2>Product Stocks List</h2>
    </div>
    <div class="col-md-12">
        @foreach ($products as $product )
                @php $stocks = $product->purchasesItems->sum('quantity') - $product->salesItems->sum('quantity'); ; @endphp

               @php
                if ($stocks <= 5 ) {
                    echo'<div class="alert alert-danger " role="alert">';
                        echo $product->title ;
                        echo ' Product Stock is Short, '. $stocks. ' Products  Stock  </div>';
                }
            @endphp
        @endforeach
    </div>


</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Products Stocks List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Purchase</th>
                <th>Sales</th>
                <th>Stocks</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPurchase = 0;
                    $totalSales    = 0;
                    $totalStocks    = 0;
                @endphp
                @foreach ($products as $product)
                    @php
                      $totalPurchase += $product->purchasesItems->sum('quantity');
                      $totalSales    += $product->salesItems->sum('quantity');
                      $totalStocks   += $product->purchasesItems->sum('quantity') - $product->salesItems->sum('quantity');
                    @endphp

                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->categories->title ?? 'Category Unavail!'}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$purchases=  $product->purchasesItems->sum('quantity')}}</td>
                            <td>{{$sales=      $product->salesItems->sum('quantity')}}</td>

                            <td>{{$purchases - $sales}}</td>
                        </tr>

                    @endforeach
            </tbody>
            <tfoot>
	            <tr>
	              <th colspan="3"></th>
	              <th>{{$totalPurchase}}</th>
	              <th>{{$totalSales}}</th>
	              <th>{{$totalStocks}}</th>
	            </tr>
	          </tfoot>
        </table>
      </div>
    </div>
  </div>

@stop
