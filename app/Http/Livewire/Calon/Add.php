<?php

namespace App\Http\Livewire\Calon;

use App\Models\Calon;
use App\Models\Schedule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Tonysm\RichTextLaravel\Livewire\WithRichTexts;

class Add extends ModalComponent
{
    use WithRichTexts;
    use WithFileUploads;

    public $tahunPemilihan;
    public $name;
    public $alamat;
    public $tempatLahir;
    public $tanggalLahir;
    public $foto;
    public $pendidikan;
    public $pekerjaan;
    public $visi_misi = '';

    public function rules()
    {
        $arrayRules =  [
            'tahunPemilihan' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'tempatLahir' => ['required', 'string', 'max:255'],
            'tanggalLahir' => ['required', 'date'],
            'pendidikan' => ['required', 'string', 'max:255'],
            'visi_misi' => ['required'],
            'foto' => ['required', 'file', 'mimes:jpg,jpeg,png']
        ];
        return $arrayRules;
    }

    public function render()
    {
        return view('livewire.calon.add', [
            'data' => Schedule::query()->where('tahun', '>=', date('Y', strtotime(now())))->get(),
        ]);
    }

    public function save()
    {
        $this->validate();
        $calon = Calon::create(
            [
                'schedule_id' => $this->tahunPemilihan,
                'nama' => $this->name,
                'nomer_urut' => $this->getNomorUrut(),
                'tempat_lahir' => $this->tempatLahir,
                'tanggal_lahir' => $this->tanggalLahir,
                'alamat' => $this->alamat,
                'foto' => $this->foto->store('calon', 'public'),
                'pendidikan' => $this->pendidikan,
                'pekerjaan' => $this->pekerjaan,
                'visi_misi' => $this->visi_misi,
            ]
        );
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Calon Berhasil disimpan!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->emit('calon-added');
        $this->closeModal();
    }

    public static function modalMaxWidth():string
    {
        return '4xl';
    }

    public function getNomorUrut()
    {
        $calon = Calon::query()->where('schedule_id', $this->tahunPemilihan)->get();
        $nomorUrut = count($calon)+1;
        return $nomorUrut;
    }
}
