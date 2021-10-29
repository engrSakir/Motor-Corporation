<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\InvestorContactPerson;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investors = Investor::orderBy('id','desc')->get();
        return view('backend.investor.index', compact('investors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.investor.create');
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
            'investor_name' => 'required|string|unique:investors,name',
            'opening_date' => 'required|date',
            'initial_deposit' => 'required|numeric',
            'current_amount' => 'required|numeric',
            'contact_person_name' => 'required|string',
            'contact_person_phone' => 'required|string',
            'contact_person_email' => 'nullable|email',
        ]);
        $investor = Investor::create([
            'name' => $request->investor_name,
            'opening_date' => $request->opening_date,
            'initial_deposit' => $request->initial_deposit,
            'current_amount' => $request->current_amount,
        ]);
        InvestorContactPerson::create([
            'investor_id' => $investor->id,
            'name' => $request->contact_person_name,
            'phone' => $request->contact_person_phone,
            'email' => $request->contact_person_email,
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(Investor $investor)
    {
        return view('backend.investor.show', compact('investor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(Investor $investor)
    {
        return view('backend.investor.edit', compact('investor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investor $investor)
    {
        $request->validate([
            'investor_name' => 'required|string|unique:investors,name,'.$investor->id,
            'opening_date' => 'required|date',
            'initial_deposit' => 'required|numeric',
            'current_amount' => 'required|numeric',
        ]);
        $investor->update([
            'name' => $request->investor_name,
            'opening_date' => $request->opening_date,
            'initial_deposit' => $request->initial_deposit,
            'current_amount' => $request->current_amount,
        ]);
        toastr()->success('Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investor $investor)
    {
        $investor->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }
}
