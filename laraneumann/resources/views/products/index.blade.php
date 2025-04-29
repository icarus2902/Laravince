@extends('layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-md-6">
            <small>Hello, {{Auth::user()->name}}</small>
        </div>
        <div class="col-md-12">
            <h1>Product Page</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>
            <form class="mt-2" method="POST" action="{{ route('logout') }}">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
            <div class="mt-2">
                @if(session('success'))
                    <p>{{ session('success') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->category->name ??''}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->qty }}</td>
                        <td class="text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
