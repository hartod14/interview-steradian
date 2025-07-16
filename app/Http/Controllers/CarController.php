<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Repositories\CarRepository;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CarRepository $repo)
    {
        return ApiResponse::sendResponse(CarResource::collection($repo->getAllData()), 'Success get all data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request, CarRepository $repo)
    {
        try {
            DB::beginTransaction();

            $car = $repo->storeData($request);

            DB::commit();

            return ApiResponse::sendResponse(new CarResource($car), 'Success store new car data', 201);
        } catch (\Throwable $e) {
            return ApiResponse::rollback($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return ApiResponse::sendResponse(new CarResource($car), 'Success get car data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car, CarRepository $repo)
    {
        try {
            DB::beginTransaction();

            $repo->updateData($request, $car);

            DB::commit();

            return ApiResponse::sendResponse(new CarResource($car), 'Success update car data');
        } catch (\Throwable $e) {
            return ApiResponse::rollback($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car, CarRepository $repo)
    {
        $repo->deleteData($car);

        return response()->json('Success Delete Data');
    }
}
