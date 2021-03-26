@extends('admin.layouts.master')

@section('content')

<div class="row ">
  <div class="col-12  d-flex justify-content-between p-3">
    <h3>Products</h3>
    <a class="btn btn-info" href="{{ route('products.create') }}">ADD NEW</a>
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
              <th>Category_id</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Image</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Short_Dsc</th>
              <th>Description</th>
              <th>Created_at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->category_id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->slug }}</td>
              <td><img width="60" src="{{ asset("storage/$product->image") }}"></td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->quantity }}</td>
              <td>{{ $product->short_description }}</td>
              <td>{{ $product->description }}</td>
              <td>{{ $product->created_at }}</td>

              <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-success">Edit</a> | 
                
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block">
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

