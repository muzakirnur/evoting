<?php

namespace App\Http\Livewire\Pemilih;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class Add extends ModalComponent
{
    public $nik;
    public $name;
    public $tempatLahir;
    public $tanggalLahir;
    public $jenisKelamin;
    public $alamat;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'nik' => ['required', 'numeric', 'digits:16', 'unique:users,username'],
        'name' => ['required', 'string', 'max:255'],
        'tempatLahir' => ['required', 'string', 'max:255'],
        'tanggalLahir' => ['required', 'date', 'before:today'],
        'jenisKelamin' => ['required', 'string', 'max:255'],
        'alamat' => ['required', 'string'],
        'password' => ['required', 'confirmed', 'min:8', 'string']
    ];

    public function render()
    {
        return view('livewire.pemilih.add');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try{
            $this->validate();
            $user = User::create([
                'username' => $this->nik,
                'name' => $this->name,
                'tempat_lahir' => $this->tempatLahir,
                'tanggal_lahir' => $this->tanggalLahir,
                'jenis_kelamin' => $this->jenisKelamin,
                'alamat' => $this->alamat,
                'password' => Hash::make($this->password)
            ]);
    
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Pemilih Berhasil ditambahkan!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
            $this->emit('pemilih-added');
            $this->closeModal();
        }catch(\Exception $e){
            if(isset($user)){
                $user->delete();
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => $e->getMessage(),
                'icon' => 'error',
                'iconColor' => 'red'
            ]);
        }
    }
}
