<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\VendorInfo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        $car = new Car();
        $car->car_category_id = $request->category;
        $car->vendor_id = $request->vendor;
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->purchase_price = $request->purchase_price;
        $car->selling_price = $request->selling_price;
        $car->vat_percentage = $request->vat_percentage;
        $car->discount_percentage = $request->discount_percentage;
        $car->registration = $request->registration;
        $car->mileages = $request->mileages;
        $car->placement = $request->placements;
        $car->slug = Str::slug($request->name, '-');
        $car->description = $request->description;
        $car->papers_up_to_date = $request->papers_up_to_date;
        $car->name_transfer_documents = $request->name_transfer_documents;
        if ($request->file('image')) {
            $car->image = file_uploader('uploads/car-image/', $request->image, Carbon::now()->format('Y-m-d H-i-s-a') .'-'. Str::random(8));
        }
        $car->save();

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
        return view('backend.car.edit', compact('vendors','carCategories', 'car'));
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
        $request->validate([
            'name' => 'required|string|unique:car_categories,name'
        ]);
        $car->car_category_id = $request->category;
        $car->vendor_id = $request->vendor;
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->purchase_price = $request->purchase_price;
        $car->selling_price = $request->selling_price;
        $car->vat_percentage = $request->vat_percentage;
        $car->discount_percentage = $request->discount_percentage;
        $car->registration = $request->registration;
        $car->mileages = $request->mileages;
        $car->placement = $request->placements;
        $car->description = $request->description;
        $car->slug = Str::slug($request->name, '-');
        $car->papers_up_to_date = $request->papers_up_to_date;
        $car->name_transfer_documents = $request->name_transfer_documents;
        if ($request->file('image')) {
            $car->image = file_uploader('uploads/car-image/', $request->image, Carbon::now()->format('Y-m-d H-i-s-a') .'-'. Str::random(8));
        }
        $car->save();
        toastr()->success('Saved');
        return back();
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
