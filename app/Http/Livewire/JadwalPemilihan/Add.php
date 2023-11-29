<?php

namespace App\Http\Livewire\JadwalPemilihan;

use App\Models\Schedule;
use LivewireUI\Modal\ModalComponent;

class Add extends ModalComponent
{
    public $tahun;
    public $startDate;
    public $startTime;
    public $endDate;
    public $endTime;

    protected $rules = [
        'tahun' => ['required', 'digits:4', 'unique:schedules,tahun'],
        'startDate' => ['required', 'date'],
        'startTime' => ['required', 'date_format:H:i'],
        'endDate' => ['required', 'date'],
        'endTime' => ['required', 'date_format:H:i'],
    ];

    public function render()
    {
        return view('livewire.jadwal-pemilihan.add');
    }

    public function save()
    {
        $this->validate();
        Schedule::create([
            'tahun' => $this->tahun,
            'start_time' => $this->startDate.' '.$this->startTime,
            'end_time' => $this->endDate.' '.$this->endTime,
        ]);
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Jadwal Berhasil ditambahkan!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->emit('jadwal-added');
        $this->closeModal();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
