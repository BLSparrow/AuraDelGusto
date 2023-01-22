<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->menu->name,
            'image' => $this->menu->image_url,
            'price' => $this->price_in_rub,
            'count' => $this->count,
            'user' => $this->user_id,
        ];
    }
}
