<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use PDF;

class SamplePdfGenerator extends Component
{
    public $chalan;
    public function render()
    {
        return view('livewire.backend.sample-pdf-generator')->layout('layouts.backend.app');
    }

    public function generate_chalan()
    {
        try{
            return response()->streamDownload(function () {
                PDF::loadView('backend.pdf.sample-delivery-chalan', ['chalan' => $this->chalan])->download();
            }, 'Chalan generated at ' . date('d-m-Y- h-i-s') . '.pdf');
            $this->chalan = [];
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Success !']);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => $e->getMessage()]);
        }
    }
}
