<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookingPurpose;
use Illuminate\Http\Request;

class BookingPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingPurposes = BookingPurpose::orderBy('id','desc')->get();
        return view('backend.booking-purpose.index', compact('bookingPurposes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function show(BookingPurpose $bookingPurpose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingPurpose $bookingPurpose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingPurpose $bookingPurpose)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingPurpose $bookingPurpose)
    {
        //
    }
}
