<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\Order;

class OrderRepository
{
    function getAllData()
    {
        return Order::all();
    }

    function storeData($request)
    {
        return Order::create([
            'car_id' => $request->car_id,
            'order_date' => $request->order_date,
            'pickup_date' => $request->pickup_date,
            'dropoff_date' => $request->dropoff_date,
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
        ]);
    }

    function updateData($request, $order)
    {
        $order->update([
            'car_id' => $request->car_id,
            'order_date' => $request->order_date,
            'pickup_date' => $request->pickup_date,
            'dropoff_date' => $request->dropoff_date,
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
        ]);
    }

    function deleteData($order)
    {
        $order->delete();
    }
}
