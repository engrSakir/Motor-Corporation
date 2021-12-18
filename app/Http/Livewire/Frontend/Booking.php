<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Booking as ModelsBooking;
use App\Models\BookingPurpose;
use Livewire\Component;

class Booking extends Component
{
    public $booking_form_status = 'start';
    public $name = null;
    public $date = null;
    public $email = null;
    public $phone = null;
    public $bookingPurposes = null;
    public $booking_purpose = null;
    public $booking = null;

    public function start(){
        $this->booking_form_status = 'customer_info';
        $this->customerInformationSave();
    }

    public function customerInformationSave()
    {
        $this->validate([
            'name'  => 'required',
            'date'  => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $this->booking = ModelsBooking::create([
            'name' => $this->name,
            'date' => $this->date,
            'email' => $this->email,
            'phone' => $this->phone,
            // 'booking_purpose_id' => $this->booking_purpose,
        ]);
        $this->booking_form_status = 'service_info';
    }

    public function serviceInformationSave()
    {
        $this->validate([
            'booking_purpose'  => 'required',
            'booking'  => 'required'
        ]);
        $this->booking->update([
            'booking_purpose_id' => $this->booking_purpose,
        ]);
        $this->booking_form_status = 'success';
    }

    public function selectBookingPurpose($id)
    {
        $this->booking_purpose = $id;
    }

    public function mount()
    {
        $this->bookingPurposes = BookingPurpose::latest()->get();
    }

    public function render()
    {
        return view('livewire.frontend.booking')
            ->layout('layouts.frontend.app');
    }
}
