<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarRepository
{
    function getAllData()
    {
        return Car::all();
    }

    function storeData($request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('cars', $imageName, 'public');
        }

        return Car::create([
            'car_name' => $request->car_name,
            'day_rate' => $request->day_rate,
            'month_rate' => $request->month_rate,
            'image' => $imagePath,
        ]);
    }

    function updateData($request, $car)    {
        $data = [
            'car_name' => $request->car_name,
            'day_rate' => $request->day_rate,
            'month_rate' => $request->month_rate,
        ];

        if ($request->hasFile('image')) {
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $image->storeAs('cars', $imageName, 'public');
        }

        $car->update($data);
        return $car;
    }

    function deleteData($car)
    {
        $car->delete();
    }
}
