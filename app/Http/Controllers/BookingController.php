<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    { 
        $bookings = Booking::orderBy('id','desc')->get();
        return view('backend.booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('backend.booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'nullable|string|max:11',


        ]);
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->status = $request->status;

        $booking->save();
        toastr()->success('Successfully Saved!');
        return back();
    }

    public function edit(Booking $booking)
    {
        return view('backend.booking.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'nullable|string|max:11',


        ]);
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->status = $request->status;

        $booking->save();
        toastr()->success('Successfully Saved!');
        return back();
    }

    public function show(Booking $booking)
    {
        return view('backend.booking.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return [
            'type' => 'success',
            'message' => 'Successfully destroy',
        ];
    }
}
