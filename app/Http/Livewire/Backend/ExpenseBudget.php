<?php

namespace App\Http\Livewire\Backend;

use App\Models\ExpenseBudget as ModelsExpenseBudget;
use App\Models\Investor;
use Carbon\Carbon;
use Livewire\Component;

class ExpenseBudget extends Component
{
    public $form, $expense_budgets, $investors, $amount_from_in_hand,
    $investment, $amount_from_investment;

    public function show_form(){
        $this->form = true;
    }

    public function save(){
        // dd($this->investment);
        $this->validate([
            'amount_from_in_hand' => 'nullable|numeric',
            'investment' => 'nullable|numeric',
            'amount_from_investment' => 'nullable|numeric',
        ]);
        
        $expense_budget = null;
        if($this->amount_from_in_hand > 0){
            $expense_budget = new ModelsExpenseBudget();
            $expense_budget->amount = $this->amount_from_in_hand;
            $expense_budget->month = Carbon::now();
            $expense_budget->save();
        }

        if($this->investment && $this->amount_from_investment > 0){
            $expense_budget = new ModelsExpenseBudget();
            $expense_budget->amount = $this->amount_from_investment;
            $expense_budget->month = Carbon::now();
            $expense_budget->investment_id = $this->investment;
            $expense_budget->save();
        }
        $this->amount_from_in_hand = null;
        $this->investment = null;
        $this->amount_from_investment = null;
        if($expense_budget){
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Done!']);
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something went wrong!']);
        }
    }

    public function mount(){
        $this->investors = Investor::all();
        $this->expense_budgets = ModelsExpenseBudget::latest()->get();
    }

    public function render()
    {
        $this->expense_budgets = ModelsExpenseBudget::latest()->get();
        return view('livewire.backend.expense-budget')->layout('layouts.backend.app');
    }
}
