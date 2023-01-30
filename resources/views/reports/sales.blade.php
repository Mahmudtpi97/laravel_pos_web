@extends('layouts.app')
@section('content')


<div class="row clearfix page_header mb-3">
    <div class="col-md-12 col-sm-12">
        <h3>Product Sales Reports</h3>
    </div>

    <div class="col-md-8 col-sm-12">
      <form action="{{route('reports.sales')}}" method="get">
        <div class="row align-items-end">
            <div class="col-md-4">
                <label class="col-form-label" for="startDate">Start Date: </label>
                <input type="date" class="form-control" name="start_date" id="startDate" value="{{$start_date}}">
            </div>
            <div class="col-md-4">
                <label class="col-form-label" for="endDate">End Date: </label>
                <input type="date" class="form-control" name="end_date" id="endDate" value="{{$end_date}}">
            </div>
            <div class="col-md-2 mt-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
      </form>
    </div>

</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sales Reports Form {{$start_date }} to {{ $end_date}}</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
              @php
                $totalQuantity =0;
                $totalPrice   = 0;
              @endphp
                 @foreach ($sales as $sale)
                  <?php
                     $totalQuantity += $sale->quantity;
                     $totalPrice    += $sale->total;
                  ?>
                        <tr>
                            <td>{{$sale->date}}</td>
                            <td>{{$sale->title}}</td>
                            <td>{{$sale->quantity}}</td>
                            <td>{{$sale->price}}</td>
                            <td>{{$sale->total}}</td>
                        </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-right" colspan="2">Total Quantity: </th>
                    <th>{{$totalQuantity}}</th>
                    <th class="text-right">Total:</th>
                    <th>{{$totalPrice }}</th>
                </tr>
	          </tfoot>
        </table>
      </div>
    </div>
  </div>

@stop
