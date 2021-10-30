<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carCategories = CarCategory::orderBy('id','desc')->get();
        return view('backend.car-category.index', compact('carCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.car-category.create');
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
        CarCategory::create([
            'name' => $request->name,
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CarCategory $carCategory)
    {
        return view('backend.car-category.show', compact('carCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CarCategory $carCategory)
    {
        return view('backend.car-category.edit', compact('carCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarCategory $carCategory)
    {
        $request->validate([
            'name' => 'required|string|unique:car_categories,name,'.$carCategory->id
        ]);
        $carCategory->update([
            'name' => $request->name,
        ]);
        toastr()->success('Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarCategory $carCategory)
    {
        $carCategory->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }
}
