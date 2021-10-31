<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_paid = total_sale_amount();
        $total_vat = total_vat();
        $invoices = Invoice::orderBy('id', 'desc')->paginate(500);
        return view('backend.pos.index', compact('invoices', 'total_paid', 'total_vat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointments =0;
        $itemCategories =0;
        $items =0;
        $paymentmethods = 0;
        return view('backend.pos.create', compact('appointments', 'itemCategories', 'items', 'paymentmethods'));

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
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'fixed_discount' => 'nullable|numeric',
            'note'              => 'nullable|string',
            'payment_method'  => 'required',

        ]);

        $invoice = new Invoice();
        $invoice->vat_percentage = 15; //Always 15% as discouse in meeting
        $invoice->discount_percentage = $request->discount_percentage ?? 0;
        $invoice->fixed_discount = $request->fixed_discount ?? 0;
        $invoice->payment_method_id = $request->payment_method;
        $invoice->note = $request->note;
        $invoice->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $pdf = PDF::loadView('backend.pos.pos-pdf', compact('invoice'));
        return $pdf->stream('Invoice-' . config('app.name') . '.pdf');
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
        //
    }
}
