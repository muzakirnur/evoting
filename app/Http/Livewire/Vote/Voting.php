<?php

namespace App\Http\Livewire\Vote;

use App\Models\Calon;
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
}
