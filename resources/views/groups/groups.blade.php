@extends('layouts.app')

@section('content')

<div class="row clearfix page_header mb-3">
    <div class="col-md-6">
        <h2> User Groups </h2>
    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-info" href="{{ url('groups/create') }}"> <i class="fa fa-plus"></i> New Group </a>
    </div>
</div>

<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User All Groups</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th class="text-right">Actions</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($groups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>{{$group->title}}</td>
                        <td class="text-right">
                            <form action="{{url('groups/'.$group->id)}}" method="POST">
                                <a href="{{route('groups.edit',['group' =>$group->id] ) }}" class="btn btn-success mb-1"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are You Sure Delete This Group') " type="submit" class="btn btn-danger">Delete</button>
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
