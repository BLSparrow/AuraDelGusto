<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'table_id' => $this->table_id,
            'dateStart' => $this->dateStart,
            'dateEnd' => $this->dateEnd,
            'prepayment' => $this->prepayment,
            'table_number' => $this->table->number,
        ];
    }
}
