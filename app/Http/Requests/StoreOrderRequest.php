<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'car_id' => 'required',
            'order_date' => 'required|date',
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date',
            'pickup_location' => 'required|string|max:50',
            'dropoff_location' => 'required|string|max:50',
        ];
    }
}
