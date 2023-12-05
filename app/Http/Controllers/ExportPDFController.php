<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Rmunate\Utilities\SpellNumber;

class ExportPDFController extends Controller
{
    public function perolehanSuara($id)
    {
        $schedule = Schedule::findOrFail($id);
        $data = Calon::query()->with('schedule')->where('schedule_id', $schedule->id)->get();
        $spellTotal = SpellNumber::value($data->sum('vote'))->locale('id_ID', SpellNumber::SPECIFIC_LOCALE)->toLetters();
        return view('export.hasil', compact('data', 'schedule', 'spellTotal'));
    }

    public function rekapCatatan($id)
    {
        $schedule = Schedule::findOrFail($id);
        $data = User::query()->where('is_admin', false)->get();
        $voted = Vote::query();
        $votedM = $voted->whereHas('user', function($query){
            return $query->where('jenis_kelamin', 'Laki-Laki');
        })->count();
        $votedF = $voted->whereHas('user', function($query){
            return $query->where('jenis_kelamin', 'Perempuan');
        })->count();
        $totalVoted = $voted->count();
        return view('export.catatan', compact('data', 'schedule', 'voted', 'totalVoted', 'votedM', 'votedF'));
    }
}
