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
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
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
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $product->name }}">
                                @error('name')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Please Choose</option>
                                @foreach ($categories as $category)
                                    <option {{ $product->category_id==$category->id?"selected":'' }} value="{{ $category->id }}">{{ $category->name }}</option> 
                                @endforeach
                                   
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                <img width="60" src="{{ asset("storage/$product->image") }}">
                                @error('image')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" value="{{ $product->price }}">
                                @error('price')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" value="{{ $product->quantity }}">
                                @error('quantity')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_description">short_description</label>
                                <textarea name="short_description" id="short_description" class="form-control">{{ $product->short_description }}</textarea>
                                @error('short_description')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
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