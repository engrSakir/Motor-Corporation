<?php

namespace App\Http\Livewire\Backend;

use App\Models\Investment;
use App\Models\Investor;
use App\Models\SavingInvestment as ModelsSavingInvestment;
use Livewire\Component;

class SavingInvestment extends Component
{
    // public $investor, $investment_amount, $interest, $selected_saving_investment, $investors, $investments;

    public $investor_id, $amount, $interest, $selected_saving_investment;

    public function render()
    {
        $this->investors = Investor::latest()->get();
        $this->investments = ModelsSavingInvestment::latest()->get();
        return view('livewire.backend.saving-investment')->layout('layouts.backend.app');
    }

    public function submit()
    {
        $this->validate([
            'investor_id' => 'required|exists:investors,id',
            'amount' => 'required|numeric',
            'interest' => 'required|numeric',
        ]);
        if ($this->selected_saving_investment) {
            $model = $this->selected_saving_investment;
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Updated']);
        } else {
            $model = new ModelsSavingInvestment();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Saved']);
        }
        $model->investor_id = $this->investor_id;
        $model->amount = $this->amount;
        $model->interest = $this->interest;
        $model->save();

        $this->investor_id = $this->amount = $this->interest = null;
    }


    public function select_saving_investment(ModelsSavingInvestment $savingInvestment, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_saving_investment = $savingInvestment;
            $this->investor_id = $this->selected_saving_investment->investor_id;
            $this->amount = $this->selected_saving_investment->amount;
            $this->interest = $this->selected_saving_investment->interest;
        } else if ($purpose == 'delete') {
            $savingInvestment->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Successfully Deleted']);
        }
    }
}
