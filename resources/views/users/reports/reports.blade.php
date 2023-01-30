@extends('layouts.user_layout')
@section('user_content')

<div class="row clearfix page_header mb-3">
    <div class="col-md-12 col-sm-12">
        <h3>User Reports</h3>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sales->sum('total')}}TK</div>
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
        <h6 class="m-0 font-weight-bold text-primary">Sales Reports</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Products</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th class="text-right">Total</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{$sale->title }}</td>
                        <td>{{$sale->quantity }}</td>
                        <td>{{$sale->price }}</td>
                        <td class="text-right">{{$sale->total }}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th>Total: </th>
                      <th>{{$sales->sum('quantity')}}</th>
                      <th>{{$sales->sum('price')}}</th>
                      <th class="text-right">{{$sales->sum('total')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>
<!-- Purchase Table Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Purchase Reports</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Products</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th class="text-right">Total</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{$purchase->title }}</td>
                        <td>{{$purchase->quantity }}</td>
                        <td>{{$purchase->price }}</td>
                        <td class="text-right">{{$purchase->total }}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th> Total: </th>
                      <th>{{$purchases->sum('quantity')}}</th>
                      <th>{{$purchases->sum('price')}}</th>
                      <th class="text-right">{{$purchases->sum('total')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>
<!-- Payments Table Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Payments Reports</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm"  width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Date</th>
                      <th class="text-right">Amount</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{$payment->date}}</td>
                        <td class="text-right">{{$payment->amount}}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th>Total :</th>
                      <th class="text-right">{{$payments->sum('amount')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>
<!-- Purchases Table Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Receipts Reports </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm"  width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Date</th>
                      <th class="text-right">Amount</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($receipts as $receipt)
                    <tr>
                        <td>{{$receipt->date}}</td>
                        <td class="text-right">{{$receipt->amount}}</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot class="border-top">
                  <tr>
                      <th>Total: </th>
                      <th class="text-right">{{$receipts->sum('amount')}}</th>
                  </tr>
                </tfoot>
          </table>
        </div>
      </div>
</div>


@stop
