@extends('layouts.app')

@section('content')

<div class="row clearfix page_header mb-3">
    <div class="col-md-12 col-sm-12">
        <h3 class="d-inline-block">Daily Reports</h3>
    </div>
    <div class="col-md-12">
        @foreach ($products as $product )
                @php $stocks = $product->purchasesItems->sum('quantity') - $product->salesItems->sum('quantity'); ; @endphp

               @php
                if ($stocks <= 5 ) {
                    echo'<div class="alert alert-danger " role="alert">';
                            echo $product->title;
                    echo ' Product Stock is Short, '. $stocks. ' Products Stock  </div>';
                }
            @endphp
        @endforeach
    </div>

    <div class="col-md-8 col-sm-12">
      <form action="{{route('reports.dailyReports')}}" method="get">
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


<div class="row justify-content-end">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sales->sum('total')}}TK </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Purchases</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$purchases->sum('total')}}TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Payments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$payments->sum('amount')}}TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Receipts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$receipts->sum('total')}}TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Sales Table Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sales Reports Form {{$start_date}} to {{$end_date}}</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Products</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{$sale->title }}</td>
                        <td>{{$sale->quantity }}</td>
                        <td>{{$sale->price }}</td>
                        <td>{{$sale->total }}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th>#Products</th>
                      <th>{{$sales->sum('quantity')}}</th>
                      <th>{{$sales->sum('price')}}</th>
                      {{-- <th class="text-right">Total Amount: </th> --}}
                      <th>{{$sales->sum('total')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>
<!-- Purchase Table Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Purchase Reports Form {{$start_date}} to {{$end_date}}</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Products</th>
                      <th>Quantity</th>
                      <th>Average</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{$purchase->title }}</td>
                        <td>{{$purchase->quantity }}</td>
                        <td>{{$purchase->price }}</td>
                        <td>{{$purchase->total }}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th class="text-right">Total Quantity: </th>
                      <th>{{$purchases->sum('quantity')}}</th>
                      <th class="text-right">Total Amount: </th>
                      <th>{{$purchases->sum('total')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>
<!-- Payments Table Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Payments Reports Form {{$start_date }} to {{ $end_date}}</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Admin</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Note</th>
                      <th>Amount</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{optional($payment->admin)->name}}</td>
                        <td>{{optional($payment->user)->name}}</td>
                        <td>{{$payment->date}}</td>
                        <td>{{$payment->note??'Note Unavailable'}}</td></td>
                        <td>{{$payment->amount}}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th class="text-right" colspan="4">Total Amount: </th>
                      <th>{{$payments->sum('amount')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>
<!-- Purchases Table Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Receipts Reports Form {{$start_date }} to {{ $end_date}}</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Admin</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Note</th>
                      <th>Amount</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($receipts as $receipt)
                    <tr>
                        <td>{{optional($receipt->admin)->name}}</td>
                        <td>{{optional($receipt->user)->name}}</td>
                        <td>{{$receipt->date}}</td>
                        <td>{{$receipt->note??'Note Unavailable'}}</td></td>
                        <td>{{$receipt->amount}}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th class="text-right" colspan="4">Total Amount: </th>
                      <th>{{$receipts->sum('amount')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>

@stop

