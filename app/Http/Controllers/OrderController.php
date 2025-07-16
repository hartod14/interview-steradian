<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderRepository $repo)
    {
        return ApiResponse::sendResponse(OrderResource::collection($repo->getAllData()), 'Success get all data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, OrderRepository $repo)
    {
        try {
            DB::beginTransaction();

            $order = $repo->storeData($request);

            DB::commit();

            return ApiResponse::sendResponse(new OrderResource($order), 'Success store new order data', 201);
        } catch (\Throwable $e) {
            return ApiResponse::rollback($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return ApiResponse::sendResponse(new OrderResource($order), 'Success get order data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order, OrderRepository $repo)
    {
        try {
            DB::beginTransaction();

            $repo->updateData($request, $order);

            DB::commit();

            return ApiResponse::sendResponse(new OrderResource($order), 'Success update order data');
        } catch (\Throwable $e) {
            return ApiResponse::rollback($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, OrderRepository $repo)
    {
        $repo->deleteData($order);

        return response()->json('Success Delete Data');
    }
}
