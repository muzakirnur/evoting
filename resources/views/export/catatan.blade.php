<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catatan Pelaksanaan Pemilihan Tahun {{ $schedule->tahun }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="font-bold text-2xl uppercase text-center">Catatan Pelaksanaan</h1>
    <h1 class="font-bold text-2xl uppercase text-center">Pemungutan Suara dan Penghitungan Suara</h1>
    <h1 class="font-bold text-2xl uppercase text-center">Pemilihan Kepala Desa</h1>
    <h1 class="font-bold text-2xl uppercase text-center">Pada Sistem E-Voting</h1>
    <div class="p-8 w-full">
        <table class="table-auto mx-auto border-2 border-slate-300">
            <col>
            <colgroup span="2"></colgroup>
            <colgroup span="2"></colgroup>
            <tr>
                <th class="p-2 border-2 border-slate-300 uppercase text-left" colspan="5">A.Data Hak Pilih</th>
            </tr>
            <tr>
              <th class="p-2 border-2 border-slate-300 uppercase text-center" rowspan="2">No</th>
              <th class="p-2 border-2 border-slate-300 uppercase text-center" rowspan="2">Uraian</th>
              <th class="p-2 border-2 border-slate-300 uppercase text-center" colspan="3" scope="colgroup">Keterangan</th>
            </tr>
            <tr>
              <th class="text-left p-2 border-2 border-slate-300 uppercase" scope="col">Laki-Laki</th>
              <th class="text-left p-2 border-2 border-slate-300 uppercase" scope="col">Perempuan</th>
              <th class="text-left p-2 border-2 border-slate-300 uppercase" scope="col">Jumlah</th>
            </tr>
            <tr>
              <td class="text-center border-2 border-slate-300 p-2">1</td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    Jumlah Hak Pilih Pemilihan Kepala Desa dalam DPT
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium"></p>
                {{ $data->where('jenis_kelamin', 'Laki-Laki')->count() }}
            </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $data->where('jenis_kelamin', 'Perempuan')->count() }}
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $data->count() }}
                </p>
              </td>
            </tr>
            <tr>
              <td class="text-center border-2 border-slate-300 p-2">2</td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    Jumlah Hak Pilih yang menggunakan Hak pilihnya
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $votedM }}
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $votedF }}
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $votedM + $votedF }}
                </p>
              </td>
            </tr>
            <tr>
              <td class="text-center border-2 border-slate-300 p-2">3</td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    Jumlah hak pilih yang tidak menggunakan Hak Pilihnya
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $data->where('jenis_kelamin', 'Laki-Laki')->count() - $votedM }}
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $data->where('jenis_kelamin', 'Perempuan')->count() - $votedF }}
                </p>
              </td>
              <td class="text-center border-2 border-slate-300 p-2">
                <p class="font-medium">
                    {{ $data->count() - ($votedM+$votedF) }}
                </p>
              </td>
            </tr>
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