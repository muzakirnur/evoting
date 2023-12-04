<?php

namespace App\Http\Livewire\Vote;

use App\Models\Calon;
use App\Models\OneTimePad;
use App\Models\Vote;
use LivewireUI\Modal\ModalComponent;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Pilih extends ModalComponent
{
    public $name;
    public $nomerUrut;
    public $schedule;
    public $pilihan;

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
        $vote = Vote::create([
            'schedule_id' => $this->schedule,
            'user_id' => auth()->id(),
            'pilihan' => hash('sha256', $this->nomerUrut),
        ]);
        $plainText = hash('sha256', $vote->pilihan);
        $pad = OneTimePad::generatePad($plainText);
        $chiperText = OneTimePad::encrypt($plainText, $pad);
        $decrypted_plaintext = OneTimePad::decrypt($chiperText, $pad);
        if($plainText == $decrypted_plaintext){
            $calon = Calon::query()->where('schedule_id', $this->schedule)->where('nomer_urut', $this->nomerUrut)->first();
            $calon->update(['vote' => $calon->vote+1]);
        }
        return redirect()->to('/')->with('success', 'Berhasil melakukan pemilihan!');
    }
}
