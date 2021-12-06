<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Invoice;
use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->paginate(500);
        return view('backend.invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *($priceExVat / 100) * $vatRate
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     * invoice
     * booking
     * delivery-challan
     * invoice-with-delivery-chalan
     */
    public function show(Invoice $invoice)
    {
        if(request()->type == 'invoice'){
            $pdf = PDF::loadView('backend.invoice.invoice-pdf', compact('invoice'));
            return $pdf->stream('Invoice-' . config('app.name') . '.pdf');
        }else if(request()->type == 'booking'){
            $pdf = PDF::loadView('backend.invoice.booking-pdf', compact('invoice'));
            return $pdf->stream('Booking-' . config('app.name') . '.pdf');
        }else if(request()->type == 'delivery-challan'){
            $pdf = PDF::loadView('backend.invoice.delivery-challan-pdf', compact('invoice'));
            return $pdf->stream('Delivery-chalan-' . config('app.name') . '.pdf');
        }else{
            $pdf = PDF::loadView('backend.invoice.invoice-with-delivery-chalan-pdf', compact('invoice'));
            return $pdf->stream('Invoice-with-invoice-' . config('app.name') . '.pdf');
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    public function customer()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get()->groupBy('client_phone');
        return view('backend.customer.index', compact('invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }

    public function searchByCategory($category = 'All')
    {
        $items = Car::where('status', 'Available')->get();
        if ($category != 'All') {
            $items = Car::where('car_category_id', $category)->where('status', 'Available')->get();
        }
        return $items;
    }

    public function deliveryChallan(){
        $invoices = Invoice::orderBy('id', 'desc')->paginate(500);
        return view('backend.delivery-challan.index', compact('invoices'));
    }

    public function deliveryChallanShow(Invoice $invoice){
        $pdf = PDF::loadView('backend.delivery-challan.show-pdf', compact('invoice'));
        return $pdf->stream('Delivery Challan-' . config('app.name') . '.pdf');
    }
}
