<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Resources\ProductResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        if($products->count()>0){
            return ProductResource::collection($products);

        }else{
            return response()->json(['message'=>'no record available'], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required',
            'price'=>'required|integer',
        ]);

        $product=product::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
        ]);
        return response()->json([
            'message'=>'product created successfully',
            'data'=>new ProductResource($product)
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::find($id);
        if ($product) {
            return new ProductResource($product);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
        ]);
    
        $product->update([
            'name' => $request->name ?? $product->name,
            'description' => $request->description ?? $product->description,
            'price' => $request->price ?? $product->price,
        ]);
    
        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        if(!$product){
            return response()->json(['message'=>'product not found'],404);
        }
        $product->delete();

        return response()->json([
            'message'=>'product deleted',
        ],200);
    }
}
