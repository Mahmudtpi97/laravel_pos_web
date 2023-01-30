@extends('layouts.user_layout')

@section('user_content_btn')
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#salesInvoiceModel">
        <i class="fa fa-plus"></i> New Sale
    </button>
@stop

@section('user_content')
    	<!-- DataTales Example -->
  	<div class="card shadow mb-4 p-4">
	    <div class="card-header p-0 pb-2">
	       <h6 class="m-0 font-weight-bold text-primary"> Sale of <strong>{{ $users->name }} </strong></h6>
	    </div>

	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              {{-- <th>SL</th> --}}
		              <th>Challen No</th>
		              <th>Customer</th>
		              <th>Date</th>
		              <th>Items</th>
		              <th>Total</th>
		              <th class="text-right">Actions</th>
		            </tr>
		          </thead>
		          <tbody>
                    @php
                        $totalItems = 0;
                        $totalPrice = 0;
                    @endphp
		          	@foreach ($users->sales as $key=> $sale)
			            <tr>
			              {{-- <td>{{$key+1}}</td> --}}
			              <td>{{$sale->challan_no}}</td>
			              <td>{{$users->name}}</td>
			              <td>{{$sale->date}} </td>
			              <td>
                            @php
                                $totalQty = $sale->items->sum('quantity');
                                $totalItems += $totalQty;
                                echo $totalQty;
                            @endphp
                        </td>
			            <td>
                            @php
                                $total = $sale->items->sum('total');
                                $totalPrice += $total;
                                echo $total;
                            @endphp
                        </td>
			              <td class="text-right">
			              	<form method="POST" action=" {{ route('user.sales.invoice.destroy', ['id' => $users->id, 'invoice_id'=>$sale->id]) }} ">
                                    <a class="btn btn-primary btn-sm" href="{{ route('user.sales.invoice.show', ['id'=> $users->id, 'invoice_id'=>$sale->id]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
			              		@if ($totalQty == 0)
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure Delete This Invoice?')" type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @endif
			              	</form>
			              </td>
			            </tr>
		            @endforeach
		          </tbody>
                  <tfoot>
		            <tr>
		              {{-- <th>SL</th> --}}
		              <th>Challan No</th>
		              <th>Customer</th>
		              <th>Date</th>
		              <th>{{$totalItems}} Items</th>
		              <th colspan="2">{{$totalPrice}} TK</th>
		            </tr>
		          </tfoot>
		        </table>
		      </div>
	    </div>

  	</div>
     <!-- Model by Add New Sales -->
 <div class="modal fade" id="salesInvoiceModel" tabindex="-1" role="dialog" aria-labelledby="salesInvoiceModel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('user.sales.invoice.store',$users->id)}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title" id="salesInvoiceModel">Add New Sales</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group row">
                            <label for="text" class="col-sm-3 col-form-label text-right"> Challan No: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="challan_no" id="text" placeholder="Enter Challan Number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label text-right"> Date: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="date" name="date" id="date" placeholder="Select a Date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="note" class="col-sm-3 col-form-label text-right"> Note: </label>
                            <div class="col-sm-9">
                                <textarea name="note" id="note" placeholder="Enter Your Note" class="form-control"> </textarea>
                            </div>
                        </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-danger" type="button" data-dismiss="modal" >Close</button>
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
