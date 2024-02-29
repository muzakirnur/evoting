<?php

namespace App\Http\Livewire\Vote;

use App\Models\Calon;
use App\Models\OneTimePad;
use App\Models\Schedule;
use App\Models\Vote;
use Livewire\Component;

class Voting extends Component
{
    public $tahun;
    public $calon;
    public $start;
    public $end;
    public $scheduleID;
    public $voted;

    protected $listeners = ['vote-added' => '$refresh'];

    public function mount(Schedule $schedule)
    {
        $this->scheduleID = $schedule->id;
        $this->tahun = $schedule->tahun;
        $this->calon = Calon::query()->where('schedule_id', $schedule->id)->get();
        $this->start = $schedule->start_time;
        $this->end = $schedule->end_time;
        $this->voted = Vote::query()->where('user_id', auth()->id())->where('schedule_id', $this->scheduleID)->first();
    }

    public function render()
    {
        return view('livewire.vote.voting', [
            'data' => $this->calon,
        ]);
    }

    public function saveCalon(Calon $calon)
    {
        $nomerUrut = $calon->nomer_urut;
        $vote = Vote::create([
            'schedule_id' => $this->scheduleID,
            'user_id' => auth()->id(),
            'pilihan' => hash('sha256', $nomerUrut . date('H:i:s', strtotime(now()))),
        ]);
        $plainText = $vote->pilihan;
        $pad = OneTimePad::generatePad($plainText);
        $chiperText = OneTimePad::encrypt($plainText, $pad);
        $decrypted_plaintext = OneTimePad::decrypt($chiperText, $pad);
        if($plainText == $decrypted_plaintext){
            $calon = Calon::query()->where('schedule_id', $this->scheduleID)->where('nomer_urut', $nomerUrut)->first();
            $calon->update(['vote' => $calon->vote+1]);
        }
        return redirect()->to('/')->with('success', 'Berhasil melakukan pemilihan!');
    }
}
