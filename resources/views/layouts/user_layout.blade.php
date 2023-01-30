@extends('layouts.app')
@section('content')


<div class="row justify-content-end">

    <div class="col-xl-2 col-md-5 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                                $totalSales=0;
                                foreach ($users->sales as $sale ){
                                     $totalSales += $sale->items->sum('total');
                                }
                                echo $totalSales.'TK';
                            @endphp

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-5 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Purchases</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                                $totalPurchase = 0;
                                foreach ($users->purchases as $purchase){
                                    $totalPurchase += $purchase->items->sum('total');
                                }
                                echo $totalPurchase.'TK';
                            @endphp
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-5 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Payments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPayment = $users->payment->sum('amount')}}TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-5 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Receipts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalReceipts = $users->receipt->sum('amount')}}TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-5 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Balence</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                                $totalBalance = ($totalPurchase + $totalReceipts) - ($totalSales + $totalPayment);

                                if ($totalBalance >= 0){
                                     echo $totalBalance.'TK';
                                }
                                else{
                                    echo '0TK';
                                }
                            @endphp


                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-5 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Deu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          @php
                                if ($totalBalance < 0){
                                echo $totalBalance.'TK';
                                }
                                else{
                                    echo '0TK';
                                }
                          @endphp
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row clearfix page_header mb-3">
    <div class="col-md-12 text-right">
            @yield('user_content_btn')
    </div>
</div>

<div class="card-body shadow p-4 ">
     @if ($errors->any())
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
     @endif
    <div class="row clearfix">
        <div class="col-md-2 mt-4">
            <div class="nav flex-column nav-pills">
                <a href="{{route('users.show',   $users->id)}}" class="nav-link @if($tab_menu=='User_info') active @endif">User Info</a>
                <a href="{{route('users.reports', $users->id)}}" class="nav-link @if($tab_menu=='Reports') active @endif">Reports</a>
                <a href="{{route('user.payments',$users->id)}}" class="nav-link @if($tab_menu=='Payments')  active @endif">Payment</a>
                <a href="{{route('user.purchases',$users->id)}}" class="nav-link @if($tab_menu=='Purchases')  active @endif">Purchases</a>
                <a href="{{route('user.receipts',$users->id)}}" class="nav-link @if($tab_menu=='Receipts') active @endif">Recipes</a>
                <a href="{{route('user.sales',   $users->id)}}" class="nav-link @if($tab_menu=='Sales') active @endif ">Sales</a>
            </div>
        </div>

        <div class="col-md-10">
             @yield('user_content')
        </div>
    </div>

</div>


  @stop
