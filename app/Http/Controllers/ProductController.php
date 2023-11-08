<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::query()->where('deleted','=',false)->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->deleted = false;
        $product->save();
        
        return redirect()->route('product.index')->with('alert_message','Se registró el producto.');
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        
        return redirect()->route('product.index')->with('alert_message','Se actualizó el producto.');
    }

    public function delete(Product $product) 
    {
        return view('product.delete', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->deleted = true;
        $product->save();

        return redirect()->route('product.index')->with('alert_message','Se eliminó el producto.');
    }
}
