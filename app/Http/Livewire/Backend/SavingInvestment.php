<?php

namespace App\Http\Livewire\Backend;

use App\Models\Investment;
use App\Models\Investor;
use App\Models\SavingInvestment as ModelsSavingInvestment;
use App\Models\SavingInvestor;
use Livewire\Component;

class SavingInvestment extends Component
{
    public $investor_id, $amount, $type, $selected_saving_investment;

    public function render()
    {
        $this->investors = SavingInvestor::latest()->get();
        $this->investments = ModelsSavingInvestment::latest()->get();
        return view('livewire.backend.saving-investment')->layout('layouts.backend.app');
    }

    public function submit()
    {
        $this->validate([
            'investor_id' => 'required|exists:saving_investors,id',
            'amount' => 'required|numeric',
            'type' => 'required|string',
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
        $model->type = $this->type;
        $model->save();

        $this->investor_id = $this->amount = $this->type = null;
    }


    public function select_saving_investment(ModelsSavingInvestment $savingInvestment, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_saving_investment = $savingInvestment;
            $this->investor_id = $this->selected_saving_investment->investor_id;
            $this->amount = $this->selected_saving_investment->amount;
            $this->type = $this->selected_saving_investment->type;
        } else if ($purpose == 'delete') {
            $savingInvestment->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Successfully Deleted']);
        }
    }
}
