@extends('admin.layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
      <div class="mt-3 d-flex align-items-center justify-content-between">
        <h3>Create Product</h3>
        <a href="{{ route('products.index') }}" class="btn btn-info text-white">Product List</a>
      </div>
      <hr>
  </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
           <div class="row">
               <div class="col-md-6 offset-md-3">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @if(session('success')) 
                               <div class="alert alert-success"> {{ session('success') }}</div>
                            @endif
                            @if(session('error')) 
                            <div class="alert alert-danger"> {{ session('error') }}</div>
                         @endif
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                @error('name')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Please Choose</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                   
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Enter price">
                                @error('price')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity">
                                @error('quantity')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sort_description">Sort Description</label>
                                <textarea name="short_description" id="short_description" class="form-control"></textarea>
                                @error('sort_description')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                @error('description')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <button type="submit" class="btn btn-success">Save</button>
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