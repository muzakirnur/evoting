<?php

namespace App\Http\Livewire\JadwalPemilihan;

use App\Models\Schedule;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $search;
    public $paginate=10;

    protected $listeners = ['jadwal-added' => '$refresh'];

    public function render()
    {
        return view('livewire.jadwal-pemilihan.table', [
            'data' => Schedule::query()->when($this->search, function($query, $search){
                return $query->where('tahun', 'LIKE', '%'.$search.'%');
            })->paginate($this->paginate),
        ]);
    }
}
