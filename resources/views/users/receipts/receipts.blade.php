@extends('layouts.user_layout')
@section('user_content_btn')
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#receiptsModel">
        <i class="fa fa-plus"></i> New Receipt
    </button>
@stop
@section('user_content')

<!-- DataTales Example -->
<div class="card shadow mb-4 p-4">

    <div class="card-header p-0 pb-2">
       <h6 class="m-0 font-weight-bold text-primary"> Receipt <strong>{{ $users->name }} </strong></h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Receipt No</th>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Note</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th colspan="3" class="text-right">Total:</th>
                  <th colspan="2" >{{$users->receipt()->sum('amount')}} <strong>Tk</strong></th>
                  <th class="text-right" >Actions</th>
                </tr>
              </tfoot>
              <tbody>
                  @foreach ($users->receipt as $receipt)
                    <tr>
                        <td>{{$receipt->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$receipt->date}}</td>
                        <td>{{$receipt->amount}}</td>
                        <td>{{$receipt->note ?? 'Note is Null!'}}</td>
                        <td class="text-right">
                            <form method="POST" action=" {{ route('user.receipts.destroy', ['id' => $users->id, 'receipt_id' =>$receipt->id]) }} ">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure Delete This Receipt?')" type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                     @endforeach
              </tbody>
            </table>
          </div>
    </div>

</div>

 <!-- Model by Add New Receipts -->
 <div class="modal fade" id="receiptsModel" tabindex="-1" role="dialog" aria-labelledby="receiptsModel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('user.receipts.store',$users->id)}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title" id="receiptsModel">Add New Payment</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"> Date: <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="date" name="date" id="date" placeholder="Select a Date" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-3 col-form-label"> Amount:  <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" id="amount" placeholder="Enter Your Amount" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-sm-3 col-form-label"> Note: </label>
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
