<?php

namespace App\Http\Livewire\Backend;

use App\Models\CarExpense;
use App\Models\Expense;
use App\Models\Investor;
use Livewire\Component;

class Dashboard extends Component
{
    public $investors, $previous_month, $previous_year = null;

    public function mount(){
        $this->investors = Investor::all();

        $this->previous_month = date('m') - 1;
        $this->previous_year = date('Y');
        if($this->previous_month == 0){
            $this->previous_month = 12;
            $this->previous_year = date('Y') -1;
        }

        $this->total_expense_of_this_month = Expense::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount') + CarExpense::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount');
        $this->total_expense_of_previous_month = Expense::whereMonth('created_at',  $this->previous_month)->whereYear('created_at',  $this->previous_year)->sum('amount') + CarExpense::whereMonth('created_at',  $this->previous_month)->whereYear('created_at',  $this->previous_year)->sum('amount');

    }

    public function render()
    {
        return view('livewire.backend.dashboard')->layout('layouts.backend.app');
    }
}
