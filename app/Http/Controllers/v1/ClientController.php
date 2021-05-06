<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index()
    {
        try {
            return response()->json(ClientResource::collection(Client::all()), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(ClientRequest $request)
    {
        try {
            $client = Client::create($request->all());
            return response()->json(new ClientResource($client), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Client $client)
    {
        try {
            return response()->json(new ClientResource($client), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(ClientUpdateRequest $request, Client $client)
    {
        try {
            $client->fill($request->all());
            $client->save();
            return response()->json(new ClientResource($client), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return response()->json('', Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
