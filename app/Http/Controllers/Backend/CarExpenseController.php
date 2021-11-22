<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\CarExpense;
use App\Models\Car;
use Illuminate\Http\Request;

class CarExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carexpenses = CarExpense::orderBy('id','DESC')->get();
        return view('backend.car_expense.index', compact('carexpenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selected_car = null;
        if(request()->car){
            $selected_car   = Car::findOrFail(request()->car);
        } 
        $cars = Car::all();
        $carexpenses = CarExpense::where('car_id',request()->car)->get();
        return view('backend.car_expense.create', compact('cars','selected_car','carexpenses'));
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
            'car_name'         => 'required|string',
            'amount'         => 'required|numeric',
            'car_id'   => 'required|exists:cars,id',
            'description'   => 'nullable',

        ]);
        $carexpense = new CarExpense();
        $carexpense->name = $request->car_name;
        $carexpense->amount = $request->amount;
        $carexpense->car_id = $request->car_id;
        $carexpense->description = $request->description;
        $carexpense->save();
        toastr()->success('Successfully Saved!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarExpense  $carexpense
     * @return \Illuminate\Http\Response
     */
    public function show(CarExpense $carExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarExpense  $carexpense
     * @return \Illuminate\Http\Response
     */
    public function edit(CarExpense $carExpense)
    {
        $cars = Car::all();
        return view('backend.car_expense.edit', compact('carExpense','cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarExpense  $carexpense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarExpense $carExpense)
    {
        $request->validate([
            'car_name'         => 'required|string',
            'amount'         => 'required|numeric',
            'car_id'   => 'required|exists:cars,id',
            'description'   => 'nullable',

        ]);
        $carExpense->amount = $request->amount;
        $carExpense->name = $request->car_name;
        $carExpense->car_id = $request->car_id;
        $carExpense->description = $request->description;
        $carExpense->save();
        toastr()->success('Successfully Updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarExpense  $carexpense
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarExpense $carExpense)
    {
        $carExpense->delete();
        return [
            'type' => 'success',
            'message' => 'Successfully destroy',
        ];
    }
}
