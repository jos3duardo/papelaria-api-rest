<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        $produtos = collect(json_decode($this->products))->map(function ($item){
            return Product::find($item);
        });

        return [
            'id' => $this->id,
            'date' => $this->creation_date,
            'total_order' => $produtos->sum('price'),
            'client' => new ClientResource($this->client),
            'products' => ProductResource::collection($produtos),
        ];
    }
}
