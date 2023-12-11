<?php

namespace App\Http\Livewire\Pemilih;

use App\Imports\UsersImport;
use Exception;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;

class Import extends ModalComponent
{
    use WithFileUploads;
    public $excel;

    protected $rules = [
        'excel' => ['required', 'file', 'mimes:csv,xls,xlsx']
    ];

    public function render()
    {
        return view('livewire.pemilih.import');
    }

    public function submit()
    {
        try{
            Excel::import(new UsersImport, $this->excel);
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Pemilih Berhasil diimport!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
            $this->emit('pemilih-added');
            $this->closeModal();
        }catch(Exception $e){
            $this->dispatchBrowserEvent('messages', [
                'title' => $e->getMessage(),
                'icon' => 'error',
                'iconColor' => 'red'
            ]);
            $this->closeModal();
        }
    }
}
