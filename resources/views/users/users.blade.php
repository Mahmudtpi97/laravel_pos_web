@extends('layouts.app')
@section('content')

    <div class="row clearfix page_header mb-3">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Users Page</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-info" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> Add New User </a>
        </div>
    </div>
    <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Users Data</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>User Group</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->usersGroup->title ?? 'Group Title Unavail!'}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td class="text-right">
                            <form action="{{route('users.destroy',['user' =>$user->id] )}}" method="POST">
                                <a href="{{route('users.show',    ['user' =>$user->id] ) }}" class="btn btn-primary mb-1"><i class="fas fa-eye"></i></a>
                                <a href="{{route('users.edit',    ['user' =>$user->id] ) }}" class="btn btn-success mb-1"><i class="fas fa-edit"></i></a>

                               @if (
                                    $user->sales()->count() == 0
                                //  && $user->purchase()->count() == 0
                                 && $user->payment()->count() == 0
                                 && $user->receipt()->count() == 0
                               )

                               @csrf
                               @method('DELETE')
                               <button onclick="return confirm('Are You Sure Delete This User ?')" type="submit" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button>

                               @endif
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
