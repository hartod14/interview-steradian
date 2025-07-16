<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->order_id,
            'car_id' => $this->car_id,
            'order_date' => $this->order_date,
            'pickup_date' => $this->pickup_date,
            'dropoff_date' => $this->dropoff_date,
            'pickup_location' => $this->pickup_location,
            'dropoff_location' => $this->dropoff_location,
        ];
    }
}
