<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'car_id' => $this->car_id,
            'car_name' => $this->car_name,
            'day_rate' => $this->day_rate,
            'month_rate' => $this->month_rate,
            'image' => $this->image ? Storage::url($this->image) : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'orders' => $this->orders,
        ];
    }
}
