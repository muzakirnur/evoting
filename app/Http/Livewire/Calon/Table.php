<?php

namespace App\Http\Livewire\Calon;

use App\Models\Calon;
use App\Models\Schedule;
use Livewire\Component;

class Table extends Component
{
    public $search;
    public $paginate;
    public $tahun;
    public function render()
    {
        return view('livewire.calon.table', [
            'data' => Calon::query()->with('schedule')->when($this->search, function($query, $search){
                return $query->where('nama', 'LIKE', '%'.$search.'%');
            })->when($this->tahun, function($query, $tahun){
               return $query->where('schedule_id', $tahun);
            })->latest()->paginate($this->paginate),
            'pemilihan' => Schedule::all(),
        ]);
    }
}
