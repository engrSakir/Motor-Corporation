<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookingPurpose;
use Carbon\Carbon;
use Illuminate\Support\Str;
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
        return view('backend.booking-purpose.create');
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
            'booking_name'         => 'required|string',
            'free_counter'         => 'required|numeric',
            'description'   => 'nullable',

        ]);
        $bookingPurpose = new BookingPurpose();
        $bookingPurpose->name = $request->booking_name;
        $bookingPurpose->max_free_counter = $request->free_counter;
        $bookingPurpose->description = $request->description;
        if ($request->file('image')) {
            $bookingPurpose->image = file_uploader('uploads/booking-image/', $request->image, Carbon::now()->format('Y-m-d H-i-s-a') .'-'. Str::random(8));
        }
        $bookingPurpose->save();

        toastr()->success('Successfully Saved!');
        return back();
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
        return view('backend.booking-purpose.edit', compact('bookingPurpose'));
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
        $request->validate([
            'booking_name'         => 'required|string',
            'free_counter'         => 'required|numeric',
            'description'   => 'nullable',

        ]);
        $bookingPurpose->name = $request->booking_name;
        $bookingPurpose->max_free_counter = $request->free_counter;
        $bookingPurpose->description = $request->description;
        if ($request->file('image')) {
            $bookingPurpose->image = file_uploader('uploads/booking-image/', $request->image, Carbon::now()->format('Y-m-d H-i-s-a') .'-'. Str::random(8));
        }
        $bookingPurpose->save();
        toastr()->success('Successfully Updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingPurpose $bookingPurpose)
    {
        $bookingPurpose->delete();
        return [
            'type' => 'success',
            'message' => 'Successfully destroy',
        ];
    }
}
