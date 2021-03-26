@extends('admin.layouts.master')
@section('content')
    
<div class="row ">
    <div class="col-12  d-flex justify-content-between p-3">
      <h3>Categories</h3>
      <a class="btn btn-info" href="{{ route('categories.index') }}">Categories List</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive ">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                   
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success text-center">{{session('success')  }}</div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger text-center">{{session('error')  }}</div>
                            @endif
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-transparent">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                </div>
            </div>
            
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection
