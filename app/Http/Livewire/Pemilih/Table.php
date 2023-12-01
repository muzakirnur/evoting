<?php

namespace App\Http\Livewire\Pemilih;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $paginate;
    public $search;

    public function render()
    {
        return view('livewire.pemilih.table', [
            'data' => User::query()->where('is_admin', false)->when($this->search, function($query, $search){
                return $query->where('name', 'LIKE', '%'.$search.'%');
            })->latest()->paginate($this->paginate),
        ]);
    }
}
