<?php

namespace App\Http\Livewire\Panitia;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Add extends ModalComponent
{
    use WithFileUploads;

    public $name;
    public $tanggalLahir;
    public $alamat;
    public $pendidikan;
    public $jabatan;
    public $foto;
    public $username;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.panitia.add');
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'alpha:ascii', 'unique:users,username'],
        'tanggalLahir' => ['required', 'date', 'before:today'],
        'alamat' => ['required', 'string', 'max:255'],
        'pendidikan' => ['required', 'string', 'max:255'],
        'jabatan' => ['required', 'string', 'max:255'],
        'foto' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        'password' => ['required', 'confirmed', 'string', 'min:8'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'tanggal_lahir' => $this->tanggalLahir,
            'alamat' => $this->alamat,
            'pendidikan' => $this->pendidikan,
            'jabatan' => $this->jabatan,
            'profile_photo_path' => $this->foto != null ? $this->foto->store('foto', 'public') : null,
            'password' => Hash::make($this->password),
            'is_admin' => true,
        ]);
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Panitia Berhasil ditambahkan!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->emit('panitia-added');
        $this->closeModal();
    }

    public static function modalMaxWidth():string
    {
        return '3xl';
    }
}
