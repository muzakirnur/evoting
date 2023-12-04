<div>
    <div class="bg-white rounded-lg p-4">
        <form wire:submit.prevent='submit'>
            <h1 class="font-semibold text-lg">Konfirmasi Pilihan!</h1>
            <hr>
            <div class="p-4">
                <p class="font-normal text-base">Apakah yakin ingin memilih <span class="text-indigo-500 font-bold text-lg">{{ $name }}</span> dengan Nomer urut <span class="text-indigo-500 font-bold text-lg">{{ $nomerUrut }}</span> ?</p>
            </div>
            <div class="flex flex-wrap">
                <div class="w-1/2 p-2">
                    <button class="btn w-full bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" type="submit">Yakin</button>
                </div>
                <div class="w-1/2 p-2">
                    <button class="btn w-full bg-slate-500 hover:bg-slate-600 text-white whitespace-nowrap" type="button" wire:click='closeModal()'>Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
