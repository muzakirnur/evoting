<div>
    <div class="w-full max-w-full">
        <div
            class="p-4 relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-sm bg-clip-border">
            <div class="flex flex-wrap mb-4 justify-between">
                <div class="w-full lg:w-1/2 mb-4 lg:text-start align-middle text-center">
                    <input type="text" class="border-slate-400 rounded-lg" placeholder="Cari Tahun.." wire:model.debounce.500ms="search" wire:click="$refresh">
                    <select wire:model='paginate' class="rounded-lg">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="w-full lg:w-1/2 mb-4 lg:text-end align-middle text-center">
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" wire:click="$emit('openModal', 'jadwal-pemilihan.add')">Tambah Jadwal</button>
                </div>
            </div>
            <div class="overflow mb-4 hidden lg:block">
                <table class="table-auto overflow-scroll w-full items-center mb-4 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-left uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Tahun</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Tanggal Mulai</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Waktu Mulai</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Tanggal Berakhir</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Waktu Berakhir</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-end uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $row->tahun }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ date('d F Y', strtotime($row->start_time)) }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ date('H:i', strtotime($row->start_time)) }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ date('d F Y', strtotime($row->end_time)) }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ date('H:i', strtotime($row->end_time)) }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex flex-wrap gap-1 justify-end">
                                    <button type="button" class="btn bg-cyan-500 hover:bg-cyan-600 text-white whitespace-nowrap" wire:click="$emit('openModal', 'jadwal-pemilihan.add',{{ json_encode(["schedule" => $row->id]) }})">Edit</button>
                                    <button type="button" class="btn bg-red-500 hover:bg-red-600 text-white whitespace-nowrap" wire:click='destroy({{ $row->id }})'>Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>