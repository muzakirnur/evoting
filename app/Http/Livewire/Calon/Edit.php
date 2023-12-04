<?php

namespace App\Http\Livewire\Calon;

use App\Models\Calon;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Tonysm\RichTextLaravel\Livewire\WithRichTexts;

class Edit extends ModalComponent
{
    use WithRichTexts;
    use WithFileUploads;

    public $calon;
    public $tahunPemilihan;
    public $name;
    public $alamat;
    public $tempatLahir;
    public $tanggalLahir;
    public $foto;
    public $pendidikan;
    public $visi_misi = '';

    public function mount(Calon $calon)
    {
        $this->tahunPemilihan = $calon->schedule->tahun;
        $this->name = $calon->nama;
        $this->alamat = $calon->alamat;
        $this->tempatLahir = $calon->tempat_lahir;
        $this->tanggalLahir = $calon->tanggal_lahir;
        $this->pendidikan = $calon->pendidikan;
        $this->visi_misi = $calon->visi_misi->toTrixHtml();
    }

    public function rules()
    {
        $arrayRules =  [
            'name' => ['required', 'string', 'max:255'],
            'tempatLahir' => ['required', 'string', 'max:255'],
            'tanggalLahir' => ['required', 'date'],
            'pendidikan' => ['required', 'string', 'max:255'],
            'visi_misi' => ['required'],
            'foto' => ['nullable', 'file', 'mimes:jpg,jpeg,png']
        ];
        return $arrayRules;
    }

    public function render()
    {
        return view('livewire.calon.edit');
    }

    public function save()
    {
        $calon = Calon::findOrFail($this->calon);
        if($calon){
            $calon->update([
                'nama' => $this->name,
                'tempat_lahir' => $this->tempatLahir,
                'tanggal_lahir' => $this->tanggalLahir,
                'pendidikan' => $this->pendidikan,
                'visi_misi' => $this->visi_misi,
            ]);

            if($this->foto){
                if(File::exists(public_path('storage/'.$calon->foto))){
                    File::delete(public_path('storage/'.$calon->foto));
                }
                $calon->update([
                    'foto' => $this->foto->store('calon', 'public'),
                ]);
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Data Calon Berhasil diupdate!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
            $this->emit('calon-added');
            $this->closeModal();
        }else{
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Data Calon tidak ditemukan!',
                'icon' => 'warning',
                'iconColor' => 'yellow'
            ]);
        }
    }
}
