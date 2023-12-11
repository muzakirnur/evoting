<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        @if ($schedule)
        <livewire:vote.voting :schedule="$schedule"/>
        @else
        <p class="font-semibold text-center">Data Pemilihan Belum ada !</p>
        @endif
    </div>
</x-app-layout>