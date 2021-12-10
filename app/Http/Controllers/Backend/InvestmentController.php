<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Investor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investments = Investment::orderBy('id','DESC')->get();
        return view('backend.investment.index', compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $investors = Investor::all();
        return view('backend.investment.create', compact('investors'));
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
            'investor' => 'required|exists:investors,id',
            'investment_amount' => 'required|numeric|min:0',
            'interest' => 'required|numeric|min:0',
            'settlement_date' => 'required|date',
        ]);
        $investment = Investment::create([
            'investor_id' => $request->investor,
            'amount' => $request->investment_amount,
            'interest' => $request->interest,
            'settlement_date' => new Carbon($request->settlement_date)
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $investment)
    {
        return view('backend.investment.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(Investment $investment)
    {
        $investors = Investor::all();
        return view('backend.investment.edit', compact('investment', 'investors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investment $investment)
    {
        $request->validate([
            'investor' => 'required|exists:investors,id',
            'investment_amount' => 'required|numeric|min:0',
            'interest' => 'required|numeric|min:0',
            'settlement_date' => 'required|date',
        ]);
        $investment->update([
            'investor_id' => $request->investor,
            'amount' => $request->investment_amount,
            'interest' => $request->interest,
            'settlement_date' => new Carbon($request->settlement_date)
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investment $investment)
    {
        $investment->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }
}
