<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <!-- Icon -->
            {{-- <img src="{{ asset('images/icon-01.svg') }}" width="32" height="32" alt="Icon 01" /> --}}
            <i class="fa-solid fa-user-pen text-2xl text-cyan-500"></i>
            <!-- Menu button -->
            <div class="relative inline-flex" x-data="{ open: false }">
                {{-- <button
                    class="rounded-full"
                    :class="open ? 'bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400': 'text-slate-400 hover:text-slate-500 dark:text-slate-500 dark:hover:text-slate-400'"          
                    aria-haspopup="true"
                    @click.prevent="open = !open"
                    :aria-expanded="open"
                > --}}
                <div
                    class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"                
                    @click.outside="open = false"
                    @keydown.escape.window="open = false"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak                
                >
                    <ul>
                        <li>
                            <a class="font-medium text-sm text-slate-600 dark:text-slate-300 hover:text-slate-800 dark:hover:text-slate-200 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-slate-600 dark:text-slate-300 hover:text-slate-800 dark:hover:text-slate-200 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a>
                        </li>
                    </ul>
                </div>
                <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Pemilih Tetap</h2>
            </div>
        </header>
        <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Total</div>
        <div class="flex items-start p-2">
            <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">{{ $dataFeed }} </div>
        </div>
    </div>
</div>
