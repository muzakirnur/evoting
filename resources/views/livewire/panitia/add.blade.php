<div class="p-5">
    <h3 class="font-semibold text-md">Tambah Panitia Pemilihan Suara</h3>
    <hr class="mb-4">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <div class="flex flex-wrap">
                <div class="w-1/2 mb-4 p-2">
                    <label for="name" class="text-base font-semibold">Nama Panitia</label>
                    <input type="text" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="name" id="name" placeholder="Nama Panitia" autofocus>
                    @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 mb-4 p-2">
                    <label for="username" class="text-base font-semibold">Username</label>
                    <input type="text" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="username" id="username" placeholder="Username">
                    @error('username') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-1/2 mb-4 p-2">
                    <label for="tanggalLahir" class="text-base font-semibold">Tanggal Lahir</label>
                    <input type="date" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="tanggalLahir" id="tanggalLahir" placeholder="Tanggal Lahir">
                    @error('tanggalLahir') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 mb-4 p-2">
                    <label for="pendidikan" class="text-base font-semibold">Pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms='pendidikan' aria-placeholder="Masukkan Alamat Lengkap">
                        <option>Pilih Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Magister">Magister</option>
                    </select>
                    @error('pendidikan') <span class="error text-red-500">{{ $message }}</span> @enderror
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
                <div class="w-1/2 p-2 mb-4">
                    <label for="jabatan" class="text-base font-semibold">Jabatan</label>
                    <input type="text" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="jabatan" id="jabatan" placeholder="Jabatan">
                    @error('jabatan') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 p-2 mb-4">
                    <label for="foto" class="text-base font-semibold">Foto</label>
                    <label class="block">
                        <span class="sr-only">Pilih Foto</span>
                        <input type="file" wire:model='foto' class="block w-full text-sm text-slate-500
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
            <div class="flex flex-wrap">
                <div class="w-1/2 p-2 mb-4">
                    <label for="password" class="text-base font-semibold">Password</label>
                    <input type="password" class="rounded-lg w-full focus:ring-indigo-500 focus:ring-inset ring-1 ring-slate-300 focus:ring-2 border-0" wire:model.debounce.500ms="password" id="password" placeholder="Password">
                    @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2 p-2 mb-4">
                    <label for="password_confirmation" class="text-base font-semibold required">Konfirmasi Password</label>
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