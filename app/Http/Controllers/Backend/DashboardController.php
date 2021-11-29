<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CarExpense;
use App\Models\Expense;
use App\Models\Investment;
use App\Models\Investor;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use PDF;


class DashboardController extends Controller
{
    public function index()
    {

        $investors = Investor::all();

        $previous_month = date('m') - 1;
        $previous_year = date('Y');
        if($previous_month == 0){
            $previous_month = 12;
            $previous_year = date('Y') -1;
        }

        $total_expense_of_this_month = Expense::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount') + CarExpense::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount');
        $total_expense_of_previous_month = Expense::whereMonth('created_at',  $previous_month)->whereYear('created_at',  $previous_year)->sum('amount') + CarExpense::whereMonth('created_at',  $previous_month)->whereYear('created_at',  $previous_year)->sum('amount');


        toastr()->success('Welcome to Dashoard');
        return view('backend.dashboard.index', compact('investors', 'total_expense_of_this_month',
        'total_expense_of_previous_month'));
    }

    public function indexReport()
    {
        $expenses = Expense::orderBy('id','DESC')->get();
        return view('backend.report.index', compact('expenses'));
    }

    public function storeReport(Request $request)
    {
        $request->validate([
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);
        $start = new Carbon($request->starting_date);
        $end = new Carbon($request->ending_date);

        $invoices = Invoice::whereBetween('created_at',[$start,$end])->get();
        $expenses = Expense::whereBetween('created_at',[$start,$end])->get();

        $total_sale_amount_of_this_month = 0;
        foreach($invoices as $inv){
            $total_sale_amount_of_this_month += $inv->price();
        }
        $count_items = [
            [
                'title' => 'Total Invoice : ',
                'count' => Invoice::whereBetween('created_at',[$start,$end])->count(),
            ],
           
            [
                'title' => 'Total Expense : ',
                'count' => Expense::whereBetween('created_at',[$start,$end])->get()->sum('amount'),
            ],
          
        ];



        $pdf = PDF::loadView('backend.report.pdf-report', compact('start', 'end', 'count_items', 'invoices', 'expenses'));
        return $pdf->stream('Report-' . config('app.name') . '.pdf');

        // return view('backend.report.view', compact('start','end','expense','income','user','invoice','appointment','salary','services','expenses','employees','customers'));
    }
}
