<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Schedule;
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
}
