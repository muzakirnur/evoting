<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use App\Models\DataFeed;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;

    class DashboardController extends Controller
    {

        /**
         * Displays the dashboard screen
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            if(auth()->user()->is_admin == false){
                return redirect()->route('vote.index');
            }else{
                $dataFeed = new DataFeed();
                $daftarPemilihTetap = User::query()->where('is_admin', false)->count();
                $daftarPanitia = User::query()->where('is_admin', true)->count();
                $vote = Vote::all()->count();
    
                return view('pages/dashboard/dashboard', compact('dataFeed', 'daftarPemilihTetap', 'daftarPanitia', 'vote'));
            }
        }
    }
