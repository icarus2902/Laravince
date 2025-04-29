
@extends('layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <h1>Create Product Page</h1>
            <a href="{{ route('products.index')}}" class="btn btn-primary">Back to Products</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-8">
            <h2>Create Product</h2>
            <form action="{{ route('products.store')}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="category_id">Select Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select one</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Enter Product Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="description">Enter Product Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="qty">Enter Product Quantity</label>
                    <input type="number" name="qty" id="qty" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Save Entry</button>
            </form>
        </div>
    </div>
@endsection
