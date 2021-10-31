<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\PaymentMethod;
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
        return view('backend.invoice.index', compact('invoices', 'total_paid', 'total_vat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemCategories = CarCategory::all();
        $items = Car::where('status', 'Available')->get();
        $paymentmethods = PaymentMethod::all();
        return view('backend.invoice.create', compact('itemCategories', 'items', 'paymentmethods'));

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
            'advance_amount' => 'nullable|numeric',
            'note'              => 'nullable|string',
            'payment_method'  => 'required',
        ]);

        $invoice = new Invoice();
        $invoice->discount_percentage = $request->discount_percentage ?? 0;
        $invoice->fixed_discount = $request->fixed_discount ?? 0;
        $invoice->payment_method_id = $request->payment_method;
        $invoice->note = $request->note;
        $invoice->save();

        try {
            foreach ($request->service_data_set as $service_data) {
                $invoiceItem = new InvoiceItem();
                $car = Car::find($service_data['service']);
                $invoiceItem->invoice_id   = $invoice->id;
                $invoiceItem->car_id   = $car->id;
                $invoiceItem->quantity  = $service_data['quantity'];
                $invoiceItem->price     = $service_data['price'];
                $invoiceItem->vat     = $service_data['vat'];
                $invoiceItem->save();
                $car->status = 'Sold';
                $car->save();
            }
            return [
                'type' => 'success',
                'message' => 'Successfully Created',
                'invoice_url' => route('backend.invoice.show', $invoice),
            ];
        } catch (\Exception $e) {
            $invoice->delete();
            return [
                'type' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        // $pdf = PDF::loadView('backend.invoice.pos-pdf', compact('invoice'));
        // return $pdf->stream('Invoice-' . config('app.name') . '.pdf');
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

    public function searchByCategory($category = 'All')
    {
        $items = Car::all();
        if ($category != 'All') {
            $items = Car::where('car_category_id', $category)->get();
        }
        return $items;
    }
}
