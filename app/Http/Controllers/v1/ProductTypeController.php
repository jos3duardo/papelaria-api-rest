<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTypeRequest;
use App\Http\Requests\ProductTypeUpdateRequest;
use App\Http\Resources\ProductTypeResource;
use App\Models\ProductType;
use Symfony\Component\HttpFoundation\Response;

class ProductTypeController extends Controller
{
    public function index()
    {
        try {
            return response()->json(ProductTypeResource::collection(ProductType::all()), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(ProductTypeRequest $request)
    {
        try {
            dd($request->all());
            $client = ProductType::create($request->all());
            return response()->json(new ProductTypeResource($client), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(ProductType $productType)
    {
        try {
            return response()->json(new ProductTypeResource($productType), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(ProductTypeUpdateRequest $request, ProductType $productType)
    {
        try {
            $productType->fill($request->all());
            $productType->save();
            return response()->json(new ProductTypeResource($productType), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(ProductType $productType)
    {
        try {
            $productType->delete();
            return response()->json([], Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
