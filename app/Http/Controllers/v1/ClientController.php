<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(ClientResource::collection(Client::all()), Response::HTTP_OK);
    }

    public function store(ClientRequest $request)
    {
        try {
            $client = Client::firstOrCreate([
                $request->all()
            ]);
            dd($client);
            return response()->json(new ClientResource($client), Response::HTTP_OK);
        }catch (\Exception $err){
            return response()->json($err->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function show(Client $client)
    {
        //
    }

    public function update(ClientRequest $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
