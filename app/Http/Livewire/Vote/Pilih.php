<?php

namespace App\Http\Livewire\Vote;

use App\Models\Calon;
use App\Models\Vote;
use LivewireUI\Modal\ModalComponent;

class Pilih extends ModalComponent
{
    public $name;
    public $nomerUrut;
    public $schedule;

    public function mount(Calon $calon)
    {
        $this->name = $calon->nama;
        $this->nomerUrut = $calon->nomer_urut;
        $this->schedule = $calon->schedule_id;
    }
    
    public function render()
    {
        return view('livewire.vote.pilih');
    }

    public function submit()
    {
        Vote::create([
            'schedule_id' => $this->schedule,
            'user_id' => auth()->id(),
            'pilihan' => hash('sha256', $this->nomerUrut),
        ]);
        return redirect()->to('/');
    }
}
