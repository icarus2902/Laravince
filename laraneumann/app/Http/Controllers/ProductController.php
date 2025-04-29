<?php

namespace App\Http\Controllers;
use App\models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = []; // Define an empty array for categories
        return view('products.index', compact('products', 'categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        Product::create($request->all());
        return redirect()->route('products.index')
        ->with('success','Product Created Successfully');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        return view ('products.edit',compact('product'));
    }


    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')
        ->with('success','Product Updated Successfully');
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')
        ->with('success','Product Deleted Successfully');

}
}
