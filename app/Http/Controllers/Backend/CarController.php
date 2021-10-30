<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\VendorInfo;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('id','desc')->get();
        return view('backend.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = VendorInfo::all();
        $carCategories = CarCategory::all();
        return view('backend.car.create', compact('vendors','carCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:car_categories,name'
        ]);
        Car::create([
            'car_category_id' => $request->category,
            'vendor_id' => $request->vendor,
            // 'status' => $request->status,
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'vat_percentage' => $request->vat_percentage,
            'discount_percentage' => $request->discount_percentage,
            'image' => $request->image,
            'registration' => $request->registration,
            'mileages' => $request->mileages,
            'description' => $request->description
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('backend.car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $vendors = VendorInfo::all();
        $carCategories = CarCategory::all();
        return view('backend.car.edit', compact('vendors','carCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }
}
