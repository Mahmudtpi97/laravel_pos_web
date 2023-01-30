@extends('layouts.app')
@section('content')


<div class="row clearfix page_header mb-3">
    <div class="col-md-12 col-sm-12">
        <h3>Receipts Reports</h3>
    </div>

    <div class="col-md-8 col-sm-12">
      <form action="{{route('reports.receipts')}}" method="get">
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
                        <td>{{$receipt->note??'Note Unavailable'}}</td>
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
