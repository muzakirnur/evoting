<div>
    <div class="w-full max-w-full">
        <div
            class="p-4 relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-sm bg-clip-border">
            <div class="flex flex-wrap justify-between">
                <div class="w-full lg:w-1/2 mb-4 lg:text-start align-middle text-center">
                    <select wire:model='tahun' class="rounded-lg">
                        @foreach ($years as $jadwal)
                            <option value="{{ $jadwal->tahun }}">{{ $jadwal->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full lg:w-1/2 mb-4 lg:text-end align-middle text-center">
                    @if (!$data)
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" wire:click="rekap">Rekap Pemenang</button>
                    @endif
                    <button class="btn bg-red-500 hover:bg-red-600 text-white whitespace-nowrap" wire:click="rekapHasil">Rekap Hasil</button>
                    <button class="btn bg-cyan-500 hover:bg-cyan-600 text-white whitespace-nowrap" wire:click="rekapCatatan">Rekap Catatan</button>
                </div>
            </div>
            <hr class="mb-4">
            <div class="overflow mb-4 hidden lg:block">
                @if (!$data)
                    <p class="font-base text-lg text-center">Data Belum direkap</p>
                @else
                    <h1 class="font-semibold text-start text-lg mb-8">Hasil Pemilihan {{ $data->schedule->tahun }}</h1>
                    <table>
                        <tr>
                            <td>Pemenang</td>
                            <td>:</td>
                            <td>{{ $data->calon->nama }}</td>
                        </tr>
                        <tr>
                            <td>Nomer Urut</td>
                            <td>:</td>
                            <td>{{ $data->calon->nomer_urut }}</td>
                        </tr>
                        <tr>
                            <td>Perolehan Suara</td>
                            <td>:</td>
                            <td>{{ $data->jumlah_suara }}</td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>