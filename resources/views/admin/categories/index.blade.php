@extends('admin.layouts.master')

@section('content')

<div class="row ">
  <div class="col-12  d-flex justify-content-between p-3">
    <h3>Categories</h3>
    <a class="btn btn-info" href="{{ route('categories.create') }}">ADD NEW</a>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      @if(session('success'))
      <div class="alert alert-success text-center">{{session('success')  }}</div>
      @endif
      @if(session('error'))
          <div class="alert alert-danger text-center">{{session('error')  }}</div>
      @endif
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Created_at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->slug }}</td>
              <td>{{ $category->created_at }}</td>

              <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-success">Edit</a> | 
                
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block">
                  @method('delete')
                  @csrf
                  <input type="submit" class="btn btn-outline-danger" value="Delete">
                </form>
              </td>
              
            </tr> 
            @endforeach 
           
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection

