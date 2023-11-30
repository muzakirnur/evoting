<div>
    <div class="w-full max-w-full">
        <div
            class="p-4 relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-sm bg-clip-border">
            <div class="flex flex-wrap mb-4 justify-between">
                <div class="w-full lg:w-1/2 mb-4 lg:text-start align-middle text-center">
                    <input type="text" class="border-slate-400 rounded-lg" placeholder="Cari Calon.." wire:model.debounce.500ms="search">
                    <select wire:model='paginate' class="rounded-lg">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <select wire:model='tahun' class="rounded-lg">
                        <option value="">Tahun Pemilihan</option>
                        @foreach ($pemilihan as $row)
                            <option value="{{ $row->id }}">{{ $row->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full lg:w-1/2 mb-4 lg:text-end align-middle text-center">
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" wire:click="$emit('openModal', 'calon.add')">Tambah Calon</button>
                </div>
            </div>
            <div class="overflow mb-4 hidden lg:block">
                <table class="table-auto overflow-scroll w-full items-center mb-4 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-left uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                </th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Tahun Pemilihan</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Nomer Urut</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Nama</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Tempat Lahir</th>
                            <th
                                class="p-2 pl-2 font-normal lg:font-bold text-center uppercase bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                Tanggal Lahir</th>
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
                                    <img src="{{ asset('storage/'. $row->foto) }}" alt="{{ $row->nama }}" class="w-24 h-24 rounded-lg">
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $row->schedule->tahun }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $row->nomer_urut }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $row->nama }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $row->tempat_lahir }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ date('d F Y', strtotime($row->tanggal_lahir)) }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex flex-wrap gap-1 justify-end">
                                    {{-- <button type="button" class="btn bg-cyan-500 hover:bg-cyan-600 text-white whitespace-nowrap" wire:click="$emit('openModal', 'calon.add',{{ json_encode(["calon" => $row->id]) }})">Edit</button> --}}
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