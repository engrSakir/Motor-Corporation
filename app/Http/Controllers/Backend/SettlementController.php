<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\Settlement;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settlements = Settlement::orderBy('id','desc')->get();
        return view('backend.settlement.index', compact('settlements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $investors = Investor::all();
        return view('backend.settlement.create', compact('investors'));
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
            'investment' => 'required|exists:investments,id',
            'settlemen_amount' => 'required|numeric|min:0'
        ]);
        Settlement::create([
            'investment_id' => $request->investment,
            'amount' => $request->settlemen_amount,
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function show(Settlement $settlement)
    {
        return view('backend.settlement.show', compact('settlement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function edit(Settlement $settlement)
    {
        $investors = Investor::all();
        return view('backend.settlement.edit', compact('investors', 'settlement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settlement $settlement)
    {
        $request->validate([
            'investment' => 'required|exists:investors,id',
            'settlemen_amount' => 'required|numeric|min:0'
        ]);
        $settlement->update([
            'investment_id' => $request->investment,
            'amount' => $request->settlemen_amount,
        ]);
        toastr()->success('Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settlement $settlement)
    {
        $settlement ->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }
}
