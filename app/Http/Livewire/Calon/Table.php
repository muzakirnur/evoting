<?php

namespace App\Http\Livewire\Calon;

use App\Models\Calon;
use App\Models\Schedule;
use DateTime;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $search;
    public $paginate;
    public $tahun;

    protected $listeners = ['calon-added' => '$refresh'];
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

    public function destroy($id)
    {
        $calon = Calon::findOrFail($id);
        if($calon){
            if($this->checkSchedule($calon->schedule_id) == true){
                $calon->delete();
                $this->dispatchBrowserEvent('messages', [
                    'title' => 'Calon Berhasil dihapus!',
                    'icon' => 'success',
                    'iconColor' => 'green'
                ]);
            }else{
                $this->dispatchBrowserEvent('messages', [
                    'title' => 'Gagal Menghapus Calon!',
                    'icon' => 'warning',
                    'iconColor' => 'yellow'
                ]);
            }
        }
        
    }

    public function checkSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        $dateNow = new DateTime();
        $dateStart = new DateTime($schedule->start_time);
        return $dateNow < $dateStart ? true : false;
    }
}
