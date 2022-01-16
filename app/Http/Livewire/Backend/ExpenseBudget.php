<?php

namespace App\Http\Livewire\Backend;

use App\Models\ExpenseBudget as ModelsExpenseBudget;
use App\Models\Investment;
use App\Models\Investor;
use Carbon\Carbon;
use Livewire\Component;

class ExpenseBudget extends Component
{
    public $form, $expense_budgets, $investors, $amount_from_in_hand,
        $investment, $amount_from_investment, $month, $note, $issue_date;

    public function show_form()
    {
        $this->form = true;
    }

    public function save()
    {
        // dd($this->investment);

        $this->validate([
            'amount_from_in_hand' => 'nullable|numeric|max:' . amount_in_hand(),
            'month' => 'required',
            'note' => 'required',
            'issue_date' => 'required',
            'investment' => 'nullable|numeric',
            'amount_from_investment' => 'nullable|numeric',
        ]);
        $expense_budget = null;
        if ($this->amount_from_in_hand > 0) {
            $expense_budget = new ModelsExpenseBudget();
            $expense_budget->amount = $this->amount_from_in_hand;
            $expense_budget->month = $this->month;
            $expense_budget->note = $this->note;
            $expense_budget->issue_date = $this->issue_date;
            $expense_budget->save();
        }

        if ($this->investment && $this->amount_from_investment > 0) {
            $this->validate([
                'investment' => 'required|numeric',
                'amount_from_investment' => 'required|numeric|max:' . Investment::find($this->investment)->totalUsableAmount(),
            ]);
            $expense_budget = new ModelsExpenseBudget();
            $expense_budget->amount = $this->amount_from_investment;
            $expense_budget->month = $this->month;
            $expense_budget->note = $this->note;
            $expense_budget->issue_date = $this->issue_date;
            $expense_budget->investment_id = $this->investment;
            $expense_budget->save();
        }
        $this->amount_from_in_hand = null;
        $this->month = null;
        $this->investment = null;
        $this->note = null;
        $this->issue_date = null;
        $this->amount_from_investment = null;
        if ($expense_budget) {
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Done!']);
        } else {
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something went wrong!']);
        }
    }

    public function mount()
    {
        $this->investors = Investor::all();
        $this->expense_budgets = ModelsExpenseBudget::latest()->get();
    }

    public function render()
    {
        $this->expense_budgets = ModelsExpenseBudget::latest()->get();
        return view('livewire.backend.expense-budget')->layout('layouts.backend.app');
    }
}
