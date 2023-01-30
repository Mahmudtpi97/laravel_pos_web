@extends('layouts.user_layout')

@section('user_content_btn')
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#invoiceItemModel">
        <i class="fa fa-plus"></i>Add Purchase Item
    </button>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#InvoicePayment">
        <i class="fa fa-plus"></i> Add Payment
    </button>
@stop

@section('user_content')

    	<!-- DataTales Example -->
  	<div class="card shadow mb-4 p-4">
	    <div class="card-header p-0 pb-2">
	       <h6 class="m-0 font-weight-bold text-primary"> Purchase Invoice Details </h6>
	    </div>

	    <div class="card-body">
            <div class="row clearfix justify-content-md-center mb-3">
	    		<div class="col-md-6">
	    			<div class="no_padding no_margin"> <strong>User:</strong>  {{ $users->name }}</div>
	    			<div class="no_padding no_margin"><strong>Email:</strong> {{ $users->email }}</div>
	    			<div class="no_padding no_margin"><strong>Phone:</strong> {{ $users->phone }}</div>
	    		</div>
	    		<div class="col-md-3"></div>
	    		<div class="col-md-3">
	    			<div class="no_padding no_margin"><strong>Date:</strong> {{ $invoice->date }} </div>
	    			<div class="no_padding no_margin"><strong>Challen No:</strong> {{ $invoice->challan_no }} </div>
	    		</div>
	    	</div>
        </div>

	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th class="text-right">Actions</th>
                      </tr>
		          </thead>
		          <tbody>
                     @foreach ($invoice->items as $key => $item)
			            <tr>
			              <td>{{$key+1}}</td>
			              <td>{{$item->product->title ?? 'Product Deleted'}}</td>
			              <td>{{$item->price}} TK</td>
			              <td>{{$item->quantity}} Pice</td>
			              <td>{{$item->total}} TK</td>
			              <td class="text-right">
			              	<form method="POST" action=" {{ route('user.purchases.invoice.destroyItem', ['id' => $users->id, 'invoice_id'=>$invoice->id, 'item_id'=>$item->id]) }} ">
			              		@csrf
			              		@method('DELETE')
			              		<button onclick="return confirm('Are you sure Delete This Item?')" type="submit" class="btn btn-danger btn-sm">
			              			<i class="fa fa-trash"></i>
			              		</button>
			              	</form>
			              </td>
			            </tr>
                     @endforeach
		          </tbody>
                  <tfoot>
		            <tr>
		              <th colspan="3">Total: </th>
		              <th> {{$invoice->items->sum('quantity')}} Pice</th>
		              <th colspan="2">{{$invoice->items->sum('total')}} TK</th>
		            </tr>
		          </tfoot>
		        </table>
		      </div>

              <table class="table table-striped mt-4">
                <tbody>
                    <tr>
                        <th>Total:</th>
                        <th class="text-right">=</th>
                        <th>{{$totalPurchase = $invoice->items->sum('total')}}TK</th>
                    </tr>
                    <tr>
                        <th>Paid:</th>
                        <th class="text-right">=</th>
                        <th>{{$totalPayment= $invoice->payments->sum('amount') }}TK</th>
                    </tr>
                    <tr>
                      @php
                             $totalCount = $totalPayment - $totalPurchase;
                            if ($totalCount  <= 0){
                                echo "<th>Deu:</th>";
                                echo "<th class='text-right'> = </th>";
                                echo" <td class='text-danger'>$totalCount TK</td>";
                            }
                            else{
                                echo"<th>Extera Payment:</th>";
                                echo"<th class='text-right'> = </th>";
                                echo"<td>  $totalCount TK</td>";
                            }
                        @endphp
                    </tr>
                </tbody>
            </table>
            <a  href="{{route('user.purchases',['id'=>$users->id] )}}" class="btn btn-danger btn-sm" ><i class="fa fa-angle-left"></i> Back to Purchases </a>

	    </div>

  	</div>
     <!-- Model by Add New Invoice Item -->
 <div class="modal fade" id="invoiceItemModel" tabindex="-1" role="dialog" aria-labelledby="invoiceItemModel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('user.purchases.invoice.createInvoiceItem',['id'=>$users->id, 'invoice_id'=>$invoice->id])}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title" id="invoiceItemModel">Add New Sales</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group row">
                            <label for="text" class="col-sm-3 col-form-label text-right"> Product ID: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">

                                <select name="product_id" id="product_id" class="form-control" required>
                                    <option>Select Product</option>
                                    @foreach ($products as $key => $product)
                                        <option value="{{$key}}">{{$product}} </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label text-right"> Price: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="price" id="price" placeholder="Enter Product Price" class="form-control" onkeyup="getTotal()" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-3 col-form-label text-right"> Quantity: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="quantity" id="quantity" placeholder="Enter Product Quantity" class="form-control" onkeyup="getTotal()" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total" class="col-sm-3 col-form-label text-right"> Total Price: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="total" id="total" placeholder="The Total Price" class="form-control" required readonly>
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

     <!-- Model by Add Purchases Invoice Payment Receipts -->
 <div class="modal fade" id="InvoicePayment" tabindex="-1" role="dialog" aria-labelledby="InvoicePayment"aria-hidden="true">
    <div class="modal-dialog" role="document">
        @if ( $totalCount >= 0 )
        <div class="alert alert-info">Payment Total Paid..</div>

        @else
        <form action="{{route('user.payments.store',['id'=>$users->id, 'invoice_id'=>$invoice->id]) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title" id="InvoicePayment">Add New Receipt</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label text-right"> Date: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="date" name="date" id="date" placeholder="Select Your Date" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label text-right"> Amount: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" id="amount" placeholder="Enter Product Amount" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="note" class="col-sm-3 col-form-label text-right">Note: </label>
                            <div class="col-sm-9">
                                <textarea name="note" id="note" placeholder="Enter The Note" class="form-control"> </textarea>
                            </div>
                        </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-danger" type="button" data-dismiss="modal" >Close</button>
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </div>
        </form>

        @endif

    </div>
</div>
<script>
    function getTotal(){
        var price = document.getElementById('price').value;
        var quantity = document.getElementById('quantity').value;

        if (price && quantity) {
            var totalPrice = price * quantity;
            document.getElementById('total').value = totalPrice;
        }
    }

</script>


@stop
