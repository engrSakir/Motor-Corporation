<?php

namespace App\Http\Livewire\Backend;

use App\Models\ExpenseBudget as ModelsExpenseBudget;
use Livewire\Component;

class ExpenseBudget extends Component
{
    public $form, $expense_budgets;

    public function show_form(){
        $this->form = true;
    }

    public function mount(){
        $this->expense_budgets = ModelsExpenseBudget::latest()->get();
    }

    public function render()
    {
        return view('livewire.backend.expense-budget')->layout('layouts.backend.app');
    }
}
