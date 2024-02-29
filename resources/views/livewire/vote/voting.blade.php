<div>
    <div class="flex flex-wrap justify-between mb-8">
        <h1 class="font-semibold text-xl">Pemilihan Kepala Desa</h1>
        <h1 class="font-semibold text-xl">{{ $tahun }}</h1>
    </div>
    @if (now() >= $start)
        @if (now() >= $end)
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 text-center">
            <span class="font-medium">Pemilihan telah Selesai!</span> Terima Kasih atas Partisipasinya!
          </div>
        @else
            @if ($voted != null)
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 text-center">
                <span class="font-medium">Anda Sudah Memilih!</span> Terima Kasih atas Partisipasinya!
              </div>
            @else
            <div class="grid grid-cols-3 gap-4">
                @foreach ($data as $calon)
                <div class="h-full">
                    {{-- <div class="bg-white rounded-lg p-4">
                        <h1 class="font-bold text-2xl text-center mb-8">{{ $calon->nomer_urut }}</h1>
                        <div class="overflow-hidden mx-auto mb-8">
                            <img src="{{ asset('storage/'.$calon->foto) }}" alt="{{ $calon->nama }}" class="max-w-full rounded-lg h-[120] w-80 mx-auto">
                        </div>
                        <div class="w-full mb-8 text-center">
                            <h1 class="font-semibold tex-2xl">{{ $calon->nama }}</h1>
                            <p class="text-base font-inter">{{ $calon->tempat_lahir .', '. date('d F Y', strtotime($calon->tanggal_lahir)) }}</p>
                        </div>
                        <div class="w-full mb-8 overflow-auto h-80">
                            {!! $calon->visi_misi !!}
                        </div>
                        <div class="w-full">
                            <button class="btn w-full bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" wire:click="$emit('openModal', 'vote.pilih', {{ json_encode(['calon' => $calon->id]) }})">Pilih</button>
                        </div>
                    </div> --}}
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div>
                            <img class="rounded-t-lg h-[360px] w-full" src="{{ asset('storage/'.$calon->foto) }}" alt="{{ $calon->nama }}">
                        </div>
                        <div class="p-2">
                        <h1 class="font-bold text-2xl text-center">{{ $calon->nomer_urut }}</h1>
                        </div>
                        <div class="w-full mb-4 text-center">
                            <h1 class="font-semibold tex-2xl">{{ $calon->nama }}</h1>
                            <p class="text-base font-inter">{{ $calon->tempat_lahir .', '. date('d F Y', strtotime($calon->tanggal_lahir)) }}</p>
                        </div>
                        <div class="w-full mb-8 overflow-auto h-80 p-4">
                            {!! $calon->visi_misi !!}
                        </div>
                        <div class="w-full p-4">
                            <button class="btn w-full bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" type="button" onclick="startSign({{ $calon->id }})">Pilih</button>
                            <button class="hidden" type="submit" id="calon{{ $calon->id }}" wire:click="saveCalon({{ $calon->id }})"></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        @endif
    @else
    <div class="w-full bg-white rounded-lg p-4">
        <div class="w-full mb-8">
            <h1 class="font-semibold text-lg">Pemilihan Belum dimulai</h1>
            <hr>
        </div>
        <div class="w-full">
            <h2 class="font-base text-xl text-center">Pemilihan Akan dimulai dalam</h2>
            <p class="text-center font-bold text-2xl" id="timer"></p>
            <h2 class="font-base text-xl text-center">Silahkan Kembali lagi Nanti!</h2>
        </div>
    </div>
    @endif
</div>
@push('custom-scripts')
@if (now() >= $start)  
<script>
// Set the date we're counting down to
var countDownDate = new Date("{{ $start }}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();

// Find the distance between now and the count down date
var distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Display the result in the element with id="demo"
document.getElementById("timer").innerHTML = days + " Hari " + hours + " Jam "
+ minutes + " Menit " + seconds + " Detik ";

// If the count down is finished, write some text
if (distance < 0) {
    clearInterval(x);
    Livewire.emit('vote-added')
}
}, 1000);
</script>
@endif
<script>
    Livewire.on('webauthnSuccess', calonId => {
        var button = document.getElementById('calon'+calonId);
        button.click();
    })
</script>
@endpush