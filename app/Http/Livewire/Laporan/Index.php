<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Calon;
use App\Models\Result;
use App\Models\Schedule;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Index extends Component
{
    public $schedule;
    public $tahun;

    public function mount()
    {
        $this->tahun = date('Y', strtotime(now()));
        $this->schedule = Schedule::query()->where('tahun', $this->tahun)->first();
    }

    public function render()
    {
        return view('livewire.laporan.index',[
            'years' => Schedule::all(),
            'data' => Result::query()->with(['schedule', 'calon'])->where('schedule_id', $this->schedule->id)->first(),
        ]);
    }

    public function rekap()
    {
        if(now() < $this->schedule->end_time){
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Voting belum selesai atau masih berlangsung!',
                'icon' => 'error',
                'iconColor' => 'red'
            ]);
        }else{
            $hasil = Result::query()->where('schedule_id', $this->schedule->id)->first();
            if(!$hasil){
                $calon = Calon::query()->where('schedule_id', $this->schedule->id)->orderBy('vote', 'DESC')->first();
                $hasil = Result::create([
                    'schedule_id' => $this->schedule->id,
                    'calon_id' => $calon->id,
                    'jumlah_suara' => $calon->vote,
                ]);
                $this->dispatchBrowserEvent('messages', [
                    'title' => 'Data Berhasil direkap!',
                    'icon' => 'success',
                    'iconColor' => 'green'
                ]);
            }else{
                $this->dispatchBrowserEvent('messages', [
                    'title' => 'Hasil sudah direkap!',
                    'icon' => 'error',
                    'iconColor' => 'red'
                ]);
            }
        }
    }

    public function rekapHasil()
    {
        $data = Calon::query()->with('schedule')->where('schedule_id', $this->schedule->id)->get();
        $pdf = Pdf::loadView('export.hasil',$data);
    }
}
