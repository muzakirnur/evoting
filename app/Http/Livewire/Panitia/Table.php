<?php

namespace App\Http\Livewire\Panitia;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $search;
    public $paginate;

    protected $listeners = ['panitia-added' => '$refresh'];

    public function render()
    {
        return view('livewire.panitia.table', [
            'data' => User::query()->where('is_admin', true)->when($this->search, function($query, $search){
                return $query->where('name', 'LIKE', '%'.$search.'%');
            })->where('id', '!=', auth()->id())->latest()->paginate($this->paginate),
        ]);
    }

    public function destroy($id)
    {
        try{
            $panitia = User::findOrFail($id);
            if($panitia){
                $panitia->delete();
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Panitia Berhasil dihapus!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
            $this->emit('panitia-added');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('messages', [
                'title' => $e->getMessage(),
                'icon' => 'warning',
                'iconColor' => 'yellow'
            ]);
        }
    }
}
