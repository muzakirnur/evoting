<?php

    namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\DataFeed;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

    class DataFeedController extends ApiController
    {

        /**
         * @param Request $request
         * @return mixed
         */
        public function getDataFeed(Request $request)
        {
            $df = new DataFeed();

            return (object)[
                'labels' => $df->getDataFeed(
                    $request->datatype,
                    'label',
                    $request->limit
                ),
                'data' => $df->getDataFeed(
                    $request->datatype,
                    'data',
                    $request->limit
                ),
            ];
        }

        public function dataSuara(Request $request)
        {
            $schedule = Schedule::query()->where('tahun', date('Y', strtotime(now())))->first();
            $calon = Calon::query()->where('schedule_id', $schedule->id)->pluck('nama', 'vote');
            return (object)[
                'labels' => $calon->values(),
                'data' => $calon->keys()
            ];
        }

        public function dataPemilih()
        {
            $schedule = Schedule::query()->where('tahun', date('Y', strtotime(now())))->first();
            $suaraDipakai = Vote::query()->where('schedule_id', $schedule->id)->count();
            $totalPemilih = User::query()->where('is_admin', false)->count();
            $total = $totalPemilih-$suaraDipakai;

            return (object)[
                'labels' => ['Digunakan', 'Tidak Digunakan'],
                'data' => [$suaraDipakai, $total],
            ];
        }
    }