<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\XSession;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        try {
            return response()->json(ProductResource::collection(Product::all()), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(ProductRequest $request)
    {
        try {
            $photo = $request->file('photo')->store('product','public');

            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->photo = $photo;
            $product->product_type_id = $request->product_type_id;
            $product->save();

            return response()->json(new ProductResource($product), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Product $product)
    {
        try {
            return response()->json(new ProductResource($product), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $data = $request->all();
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo')->store('product','public');
                Storage::disk('public')->delete($product->photo);
                $data['photo'] = $photo;
            }

            $product->fill($data);
            $product->save();

            return response()->json(new ProductResource($product), Response::HTTP_OK);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json([], Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
