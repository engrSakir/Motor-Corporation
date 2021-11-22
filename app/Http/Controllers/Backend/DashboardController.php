<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CarExpense;
use App\Models\Expense;
use App\Models\Investment;
use App\Models\Investor;
use Illuminate\Http\Request;

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
}
