<?php

namespace App\Http\Livewire\Backend;

use App\Models\CarExpense;
use App\Models\Expense;
use App\Models\ExpenseBudget;
use App\Models\Investor;
use App\Models\Invoice;
use Livewire\Component;

class Dashboard extends Component
{
    public $investors, $previous_year = null;
    public  $sale_data_of_this_year = [], $paid_data_of_this_year = [], $due_data_of_this_year = [],
        $expense_budget_data_of_this_year = [], $expense_data_of_this_year = [], $profit_data_of_this_year = [], $in_hand_data_of_this_year = [];

    public function mount()
    {
        $this->investors = Investor::all();

        // Sale
        for ($month = 1; $month <= 12; $month++) {
            $total = 0;
            foreach (Invoice::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->get() as $inv) {
                $total += $inv->totalPrice();
            }
            array_push($this->sale_data_of_this_year, $total);
        // }

        // Paid
        // for ($month = 1; $month <= 12; $month++) {
            $total = 0;
            foreach (Invoice::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->get() as $inv) {
                $total += $inv->payments->sum('amount');
            }
            array_push($this->paid_data_of_this_year, $total);
        // }

        // Due
        // for ($month = 1; $month <= 12; $month++) {
            $total = 0;
            foreach (Invoice::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->get() as $inv) {
                $total += $inv->due();
            }
            array_push($this->due_data_of_this_year, $total);
        // }

        // Expense budget
        // for ($month = 1; $month <= 12; $month++) {
            array_push($this->expense_budget_data_of_this_year, ExpenseBudget::where('month', date('Y').'-'.$month)->sum('amount'));
        // }

        // Expense
        // for ($month = 1; $month <= 12; $month++) {
            array_push($this->expense_data_of_this_year, Expense::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount') +  CarExpense::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount'));
        // }

        // Profit
        // for ($month = 1; $month <= 12; $month++) {
            $total = 0;
            foreach (Invoice::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->get() as $inv) {
                $total += $inv->totalPrice();
            }
            array_push($this->profit_data_of_this_year, $total - (Expense::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount') +  CarExpense::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount')));
        // }

        // In hand
        // for ($month = 1; $month <= 12; $month++) {
            $total = 0;
            foreach (Invoice::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->get() as $inv) {
                $total += $inv->payments->sum('amount');
            }
            array_push($this->in_hand_data_of_this_year, $total - (Expense::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount') +  CarExpense::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount')));
        }
    }

    public function render()
    {
        return view('livewire.backend.dashboard')->layout('layouts.backend.app');
    }
}
