<?php

namespace App\Http\Livewire\Backend;

use App\Models\Investor;
use App\Models\SavingInvestor as ModelsSavingInvestor;
use Livewire\Component;

class SavingInvestor extends Component
{
    public $name, $opening_date, $current_amount, $selected_saving_investor, $investors;
    public function render()
    {
        $this->investors = ModelsSavingInvestor::latest()->get();
        return view('livewire.backend.saving-investor')->layout('layouts.backend.app');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'opening_date' => 'required|date',
            'current_amount' => 'required|numeric',
        ]);
        if ($this->selected_saving_investor) {
            $model = $this->selected_saving_investor;
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Updated']);
        } else {
            $model = new ModelsSavingInvestor();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Successfully Saved']);
        }
        $model->name = $this->name;
        $model->opening_date = $this->opening_date;
        $model->current_amount = $this->current_amount;
        $model->save();
        $this->name = $this->opening_date = $this->current_amount = null;
    }

    public function select_saving_investor(ModelsSavingInvestor $savingInvestor, $purpose)
    {
        if ($purpose == 'edit') {
            $this->selected_saving_investor = $savingInvestor;
            $this->name = $this->selected_saving_investor->name;
            $this->opening_date = $this->selected_saving_investor->opening_date;
            $this->current_amount = $this->selected_saving_investor->current_amount;
        } elseif ($purpose == 'delete') {
            $savingInvestor->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Successfully Deleted']);
        }
    }
}
