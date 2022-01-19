<?php

namespace App\Http\Livewire\Backend;

use App\Models\CarExpense;
use App\Models\Expense;
use App\Models\Investor;
use App\Models\Invoice;
use Carbon\Carbon;
use Livewire\Component;
use PDF;

class Report extends Component
{
    public $starting_date;
    public $ending_date;
    public $report_data_set = [];

    public function report()
    {
        $this->validate([
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);

        $start = new Carbon($this->starting_date);
        $end = new Carbon($this->ending_date);

        // Invoice List, price, paid, due
        $invoices = Invoice::whereBetween('created_at', [$start, $end])->get();
        $total_invoice_price = $total_invoice_paid = $total_invoice_due = 0;
        foreach ($invoices as $inv) {
            $total_invoice_price += $inv->totalPrice();
            $total_invoice_due += $inv->due();
            $total_invoice_paid += $inv->payments->sum('amount', 2);
        }

        // Invoice List, price, paid, due
        $expenses = Expense::whereBetween('created_at', [$start, $end])->get();
        $car_expenses = CarExpense::whereBetween('created_at', [$start, $end])->get();


        $this->report_data_set = [
            'invoice' => [
                'price' => $total_invoice_price,
                'due'   => $total_invoice_due,
                'paid'  => $total_invoice_paid,
                'list'  => $invoices,
            ],
            'expense' => [
                'total' => $expenses->sum('amount'),
                'list' => $expenses,
            ],
            'car_expense' => [
                'total' => $car_expenses->sum('amount'),
                'list' => $car_expenses,
            ]
        ];

        return response()->streamDownload(function () {
            PDF::loadView('backend.report.pdf-report',  ['report_data_set' => $this->report_data_set, 'starting_date' => new Carbon($this->starting_date), 'ending_date' => new Carbon($this->ending_date)])->download();
        }, 'Report generated at ' . date('d-m-Y- h-i-s') . '.pdf');
    }

    public function render()
    {
        return view('livewire.backend.report')->layout('layouts.backend.app');
    }
}
