@extends('layouts.app')

@section('content')

<div class="row clearfix page_header mb-3">
    <div class="col-md-6">
        <h2> Products Categories </h2>
    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-info" href="{{ url('categories/create') }}"> <i class="fa fa-plus"></i> New Categories </a>
    </div>
</div>

<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
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
               @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td class="text-right">

                            <form action="{{url('categories/'.$category->id)}}" method="POST">
                                <a href="{{route('categories.edit',['category' =>$category->id] ) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are You Sure Delete This Category') " type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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


