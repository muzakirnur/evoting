<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelWebauthn\Actions\LoginUserRetrieval;
use LaravelWebauthn\Actions\PrepareAssertionData;
use LaravelWebauthn\Actions\PrepareCreationData;
use LaravelWebauthn\Http\Requests\WebauthnLoginAttemptRequest;

class PemilihController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $publicKey = app(PrepareAssertionData::class)($user);
        $schedule = Schedule::query()->where('tahun', date('Y', strtotime(now())))->first();
        return view('pages.vote.index', compact('schedule', 'publicKey'));
    }
}
