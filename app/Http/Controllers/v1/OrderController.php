<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        try {
            return response()->json(OrderResource::collection(Order::all()), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(OrderRequest $request)
    {
        try {
            $client = Order::create($request->all());
            return response()->json(new OrderResource($client), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Order $order)
    {
        try {
            return response()->json(new OrderResource($order), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        try {
            $order->fill($request->all());
            $order->save();
            return response()->json(new OrderResource($order), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return response()->json('', Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
