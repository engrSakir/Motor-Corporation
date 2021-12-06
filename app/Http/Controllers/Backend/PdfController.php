<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use PDF;

class PdfController extends Controller
{
    public function show(Invoice $invoice)
    {
        if(request()->type == 'invoice'){
            $pdf = PDF::loadView('backend.pdf.invoice-pdf', compact('invoice'));
            return $pdf->stream('Invoice-' . config('app.name') . '.pdf');
        }else if(request()->type == 'booking'){
            $pdf = PDF::loadView('backend.pdf.booking-pdf', compact('invoice'));
            return $pdf->stream('Booking-' . config('app.name') . '.pdf');
        }else if(request()->type == 'delivery-challan'){
            $pdf = PDF::loadView('backend.pdf.delivery-challan-pdf', compact('invoice'));
            return $pdf->stream('Delivery-chalan-' . config('app.name') . '.pdf');
        }else if(request()->type == 'payments'){
            $pdf = PDF::loadView('backend.pdf.payments-pdf', compact('invoice'));
            return $pdf->stream('Payments-' . config('app.name') . '.pdf');
        }else{
            $pdf = PDF::loadView('backend.pdf.invoice-with-delivery-chalan-pdf', compact('invoice'));
            return $pdf->stream('Invoice-with-invoice-' . config('app.name') . '.pdf');
        } 
    }
}
