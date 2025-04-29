@extends(' layouts.master')
@section('content')
<div class="row mt-2">
<div class="col-md-12">
    <h1>Edit Product Page</h1>
    <a href="{{ route('products.index')}}" class="btn btn-primary">Back to Product</a>
</div>
</div>
<div class="row mt-2">
    <div class="col-md-8">
            <h2>Edit Product</h2>
            <form action="{{ route ('products.update',$product->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Enter Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}"> 
                </div>
                <div class="form-group mt-2">
                    <label for="">Enter Product Description</label>
                    <textarea name="description" class="form-control"> {{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Enter Product QTY</label>
                    <input type="number" name="qty" class="form-control"  value="{{ $product->qty }}"> 
                </div>
                <button type="submit" class="btn btn-primary mt-2">Save</button>
                 
            </form>
    </div>

</div>
@endsection