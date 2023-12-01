<div class="p-5">
    <h3 class="font-semibold text-md">Tambah Pemilihan Tetap</h3>
    <hr class="mb-4">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <div class="flex flex-wrap">
                <div class="w-1/2 mb-4 p-2">
                    <label for="nik" class="text-base font-semibold">NIK</label>
                    <input type="number" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="nik" id="nik" placeholder="NIK Peserta" autofocus>
                    @error('nik') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 mb-4 p-2">
                    <label for="name" class="text-base font-semibold">Nama Peserta</label>
                    <input type="text" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="name" id="name" placeholder="Nama Peserta">
                    @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-1/3 mb-4 p-2">
                    <label for="tempatLahir" class="text-base font-semibold">Tempat Lahir</label>
                    <input type="text" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir">
                    @error('tempatLahir') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/3 mb-4 p-2">
                    <label for="tanggalLahir" class="text-base font-semibold">Tanggal Lahir</label>
                    <input type="date" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="tanggalLahir" id="tanggalLahir" placeholder="Tanggal Lahir">
                    @error('tanggalLahir') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/3 mb-4 p-2">
                    <label for="jenisKelamin" class="text-base font-semibold">Jenis Kelamin</label>
                    <select id="jenisKelamin" wire:model.defer='jenisKelamin' class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0">
                        <option>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenisKelamin') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="w-full mb-4 p-2">
                    <label for="alamat" class="text-base font-semibold">Alamat</label>
                    <textarea wire:model.debounce.500ms='alamat' id="alamat" cols="30" rows="5" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0"></textarea>
                    @error('alamat') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-1/2 mb-4 p-2">
                    <label for="password" class="text-base font-semibold">Password</label>
                    <input type="password" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="password" id="password" placeholder="Password">
                    @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 mb-4 p-2">
                    <label for="password_confirmation" class="text-base font-semibold">Konfirmasi Password</label>
                    <input type="password" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password">
                    @error('password_confirmation') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="w-full flex flex-wrap justify-end">
            <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Simpan</button>
        </div>
    </form>
</div>