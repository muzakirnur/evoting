<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Pemilihan Tahun {{ $schedule->tahun }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="font-bold text-2xl uppercase text-center">Rekapitulasi Hasil Perhitungan Suara</h1>
    <div class="p-8 w-full">
        <table class="table-auto mx-auto border-2 border-slate-300">
            <thead>
                <tr>
                    <th class="text-left p-2 border-2 border-slate-300 uppercase" colspan="3">A.Suara Sah</th>
                </tr>
                <tr>
                    <th class="p-2 border-2 border-slate-300 uppercase">No</th>
                    <th class="p-2 border-2 border-slate-300 uppercase">Nomor Urut</th>
                    <th class="p-2 border-2 border-slate-300 uppercase">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)   
                <tr class="border-2 border-slate-300">
                    <td class="text-center border-2 border-slate-300 p-2">
                        {{ $loop->iteration }}
                    </td>
                    <td class="text-center border-2 border-slate-300 p-2">
                        <p class="font-medium">
                            {{ $row->nomer_urut }}
                        </p>
                    </td>
                    <td class="text-left border-2 border-slate-300 p-2">
                        <p class="font-medium">
                            Tulis Dengan Angka = {{ $row->vote }}
                        </p>
                        <p class="font-medium">
                            Tulis Dengan Huruf = {{ $row->spellNumber() }}
                        </p>
                    </td>
                </tr>
                @endforeach
                <tr class="border-2 border-slate-300">
                    <td class="text-left border-2 border-slate-300 p-2">
                    </td>
                    <td class="text-left border-2 border-slate-300 p-2">
                        <p class="font-medium">
                            Jumlah Perolehan Suara Sah untuk semua nomor urut
                        </p>
                    </td>
                    <td colspan="2" class="text-left border-2 border-slate-300 p-2">
                        <p class="font-medium">
                            Tulis Dengan Angka = {{ $data->sum('vote') }}
                        </p>
                        <p class="font-medium">
                            Tulis Dengan Huruf = {{ $spellTotal }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
        window.onafterprint = function() {
            history.go(-1);
        };
    </script>
</body>
</html>