<?php

namespace App\Http\Livewire\Backend;

use App\Models\ExpenseBudget as ModelsExpenseBudget;
use Livewire\Component;

class ExpenseBudget extends Component
{
    public $expenseBudgets = null;

    public function render()
    {
        $this->expenseBudgets = ModelsExpenseBudget::latest()->get();
        return view('livewire.backend.expense-budget')->layout('layouts.backend.app');
    }
}
