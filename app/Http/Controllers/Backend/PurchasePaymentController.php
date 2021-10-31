<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Investment;
use App\Models\Investor;
use App\Models\PurchasePayment;
use Illuminate\Http\Request;

class PurchasePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $investment = Investment::find($request->investment);
        $request->validate([
            'car' => 'required|exists:cars,id',
            'investment' => 'required|exists:investments,id',
            'payment_amount' => 'required|numeric|min:0|max:'.$investment->totalUsableAmount(),
        ]);
        PurchasePayment::create([
            'car_id'        => $request->car,
            'investment_id' => $request->investment,
            'amount'        => $request->payment_amount,
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function show(PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchasePayment $purchasePayment)
    {
        //
    }

    public function purchasePayment(Car $car)
    {
        $investors =Investor::all();
        return view('backend.car.purchase-payment', compact('car', 'investors'));
    }
}
