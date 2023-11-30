<div class="p-5">
    <h3 class="font-semibold text-md">{{ $schedule ? 'Edit' : 'Tambah' }} Jadwal Pemilihan</h3>
    <hr class="mb-4">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <div class="w-full px-2">
                <label for="tahun" class="text-base font-semibold">Tahun Pemilihan</label>
                <input type="number" min="{{ date('Y', strtotime(now())) }}" step="1" class="rounded-lg w-full" wire:model="tahun" id="tahun" placeholder="Tahun Pemilihan" autofocus>
                @error('tahun') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-4 flex flex-wrap">
            <div class="w-1/2 p-2">
                <label for="startDate" class="text-base font-semibold">Tanggal Mulai</label>
                <input type="date" class="rounded-lg w-full" wire:model.debounce.500ms="startDate" id="startDate" placeholder="Tanggal Mulai">
                @error('startDate') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="w-1/2 p-2">
                <label for="startTime" class="text-base font-semibold">Waktu Mulai</label>
                <input type="time" class="rounded-lg w-full" wire:model="startTime" id="startTime" placeholder="Jam Mulai">
                @error('startTime') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-4 flex flex-wrap">
            <div class="w-1/2 p-2">
                <label for="endDate" class="text-base font-semibold">Tanggal Berakhir</label>
                <input type="date" class="rounded-lg w-full" wire:model="endDate" id="endDate" placeholder="Tanggal Berakhir">
                @error('endDate') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="w-1/2 p-2">
                <label for="endTime" class="text-base font-semibold">Waktu Berakhir</label>
                <input type="time" class="rounded-lg w-full" wire:model="endTime" id="endTime" placeholder="Jam Berakhir">
                @error('endTime') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="w-full flex flex-wrap justify-end">
            <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Simpan</button>
        </div>
    </form>
</div>