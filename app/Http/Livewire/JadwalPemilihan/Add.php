<?php

namespace App\Http\Livewire\JadwalPemilihan;

use App\Models\Schedule;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class Add extends ModalComponent
{
    public $tahun;
    public $startDate;
    public $startTime;
    public $endDate;
    public $endTime;
    public $schedule;

    public function mount(Schedule $schedule)
    {
        if($schedule){
            $this->tahun = $schedule->tahun;
            $this->startDate = $schedule->start_time != null ? date('Y-m-d', strtotime($schedule->start_time)) : null;
            $this->startTime = $schedule->start_time != null ? date('H:i', strtotime($schedule->start_time)) : null;
            $this->endDate = $schedule->end_time != null ? date('Y-m-d', strtotime($schedule->end_time)) : null;
            $this->endTime = $schedule->end_time != null ? date('H:i', strtotime($schedule->end_time)) : null;
        }
    }

    public function rules()
    {
        $arrayRules =  [
            'startDate' => ['required', 'date'],
            'startTime' => ['required', 'date_format:H:i'],
            'endDate' => ['required', 'date'],
            'endTime' => ['required', 'date_format:H:i'],
        ];
        if($this->schedule){
            $arrayRules['tahun'] = ['required', 'digits:4', Rule::unique('schedules', 'tahun')->ignore($this->schedule)];
        }else{
            $arrayRules['tahun'] = ['required', 'digits:4', 'unique:schedules,tahun'];
        }
        return $arrayRules;
    }

    public function render()
    {
        return view('livewire.jadwal-pemilihan.add');
    }

    public function save()
    {
        $this->validate();
        Schedule::updateOrCreate(
            [
                'tahun' => $this->tahun,
            ],
            [
                'start_time' => $this->startDate.' '.$this->startTime,
                'end_time' => $this->endDate.' '.$this->endTime,
            ]
        );

        $this->dispatchBrowserEvent('messages', [
            'title' => 'Jadwal Berhasil disimpan!',
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
