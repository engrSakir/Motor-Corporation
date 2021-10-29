<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\InvestorContactPerson;
use Illuminate\Http\Request;

class InvestorContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investorContactPersons = InvestorContactPerson::orderBy('investor_id','asc')->get();
        return view('backend.contact-person.index', compact('investorContactPersons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $investors = Investor::orderBy('id','desc')->get();
        return view('backend.contact-person.create', compact('investors'));
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
            'contact_person_name' => 'required|string',
            'contact_person_phone' => 'required|string',
            'contact_person_email' => 'nullable|email',
        ]);
        InvestorContactPerson::create([
            'investor_id' => $request->investor,
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
     * @param  \App\Models\InvestorContactPerson  $investorContactPerson
     * @return \Illuminate\Http\Response
     */
    public function show(InvestorContactPerson $investorContactPerson)
    {
        return view('backend.contact-person.show', compact('investorContactPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvestorContactPerson  $investorContactPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(InvestorContactPerson $investorContactPerson)
    {
        $investors = Investor::orderBy('id','desc')->get();
        return view('backend.contact-person.edit', compact('investorContactPerson', 'investors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvestorContactPerson  $investorContactPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvestorContactPerson $investorContactPerson)
    {
        $request->validate([
            'investor' => 'required|exists:investors,id',
            'contact_person_name' => 'required|string',
            'contact_person_phone' => 'required|string',
            'contact_person_email' => 'nullable|email',
        ]);
        $investorContactPerson->update([
            'investor_id' => $request->investor,
            'name' => $request->contact_person_name,
            'phone' => $request->contact_person_phone,
            'email' => $request->contact_person_email,
        ]);
        toastr()->success('Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvestorContactPerson  $investorContactPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvestorContactPerson $investorContactPerson)
    {
        $investorContactPerson->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }
}
