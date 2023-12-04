<div class="p-5">
    <h3 class="font-semibold text-md">Tambah Calon Kepala Desa</h3>
    <hr class="mb-4">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <div class="flex flex-wrap">
                <div class="w-1/2 mb-4 p-2">
                    <label for="name" class="text-base font-semibold">Nama</label>
                    <input type="text" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="name" id="name" placeholder="Nama Calon" autofocus>
                    @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 mb-4 p-2">
                    <label for="tahunPemilihan" class="text-base font-semibold">Tahun Pemilihan</label>
                    <select wire:model='tahunPemilihan' class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0">
                        <option>Tahun Pemilihan</option>
                        @foreach ($data as $row)
                        <option value="{{ $row->id }}">{{ $row->tahun }}</option>
                        @endforeach
                    </select>
                    @error('tahunPemilihan') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-1/2 mb-4 p-2">
                    <label for="tempatLahir" class="text-base font-semibold">Tempat Lahir</label>
                    <input type="text" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.defer="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir">
                    @error('tempatLahir') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 mb-4 p-2">
                    <label for="tanggalLahir" class="text-base font-semibold">Tanggal Lahir</label>
                    <input type="date" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.defer="tanggalLahir" id="tanggalLahir" placeholder="Tanggal Lahir">
                    @error('tanggalLahir') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-1/2 mb-4 p-2">
                    <label for="pendidikan" class="text-base font-semibold">Pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.defer='pendidikan' aria-placeholder="Masukkan Alamat Lengkap">
                        <option>Pilih Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Magister">Magister</option>
                    </select>
                    @error('pendidikan') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 p-2 mb-4">
                    <label for="foto" class="text-base font-semibold">Foto</label>
                    <label class="block">
                        <span class="sr-only">Pilih Foto</span>
                        <input type="file" wire:model.defer='foto' class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-500
                            hover:file:bg-violet-100
                        "/>
                        </label>
                    @error('foto') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-col">
                <div class="w-full mb-4 p-2">
                    <label for="alamat" class="text-base font-semibold">Alamat</label>
                    <textarea wire:model.defer='alamat' id="alamat" cols="30" rows="5" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0"></textarea>
                    @error('alamat') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-full mb-4 p-2">
                    <label for="visi_misi" class="text-base font-semibold">Visi & Misi</label>
                    <input type="hidden" name="visi_misi" id="x">
                    <x-trix-field input="x" wire:model.defer="visi_misi" name="visi_misi" id="x"></x-trix-field>
                    @error('visi_misi') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="w-full flex flex-wrap justify-end">
            <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Simpan</button>
        </div>
    </form>
</div>
@push('custom-scripts')
{{-- <script>
  addEventListener("trix-blur", function(event) {
        @this.set('value', trixEditor.getAttribute('value'))
    })
</script> --}}
@endpush