<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = '';
        if(request()->has('search')){
           $search = request()->get('search');
        }

        $products = Product::where('name', 'like', "%$search%")
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);

        return view('product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        

        return redirect('products')->with('success', 'Product '. $product->name .' added');
    }

    
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
       $validatedData = $request->validated();

       $product->update($validatedData);

       return redirect('products')->with('success', 'Product '. $product->name .' updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product_name = $product->name;

        $product->delete();

        return redirect('products')->with('success', 'Product '. $product_name .' deleted');
    }
}
