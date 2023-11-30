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

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        if($schedule){
            if($schedule->calon()->exists() && $schedule->vote()->exists() && $schedule->result->exists()){
                $this->dispatchBrowserEvent('messages', [
                    'title' => 'Jadwal gagal dihapus!',
                    'icon' => 'error',
                    'iconColor' => 'red'
                ]);
            }else{
                $schedule->delete();
                $this->dispatchBrowserEvent('messages', [
                    'title' => 'Jadwal Berhasil dihapus!',
                    'icon' => 'success',
                    'iconColor' => 'green'
                ]);
            }
        }
        $this->emitSelf('jadwal-added');
    }
}
