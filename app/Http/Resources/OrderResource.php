<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => (int)$this->type,
            'customer_name'=>$this->customer_name,
            'customer_phone'=>$this->customer_phone,
            'table_number'=>$this->table_number,
            'waiter_name'=>$this->waiter_name,
            'delivery_fees'=>priceFormat($this->delivery_fees),
            'service_charge'=>priceFormat($this->service_charge),
            'total_price'=>priceFormat($this->total_price),
            'menu'=>MenuResource::collection($this->menu)
        ];
    }
}
