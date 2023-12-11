<div class="p-5">
    <h3 class="font-semibold text-md">Tambah Pemilihan Tetap</h3>
    <hr class="mb-4">
    <form wire:submit.prevent="submit">
        <div class="w-full mb-4 p-2">
            <label class="block">
                <span class="sr-only">Masukkan File Excel</span>
                <input wire:model='excel' type="file" class="block w-full text-sm text-slate-500
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-full file:border-0
                  file:text-sm file:font-semibold
                  file:bg-violet-50 file:text-violet-700
                  hover:file:bg-violet-100
                "/>
              </label>
            @error('excel') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="w-1/2">
            <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Simpan</button>
        </div>
    </form>
</div>