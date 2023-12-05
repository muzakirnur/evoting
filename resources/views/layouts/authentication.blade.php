<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script>          
    </head>
    <body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400">

        <main class="bg-[url('../../public/images/bg.jpg')] bg-blend-multiply bg-center bg-no-repeat">

            <div class="relative">

                <!-- Content -->
                <div class="w-full">

                    <div class="min-h-screen h-full flex flex-col after:flex-1">

                        <!-- Header -->
                        <div class="flex-1">
                            <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-4">
                                <!-- Logo -->
                                <a class="block" href="{{ route('dashboard') }}">
                                    <div class="p-5 flex flex-wrap gap-1">
                                        <img src="{{ asset('images/langkat.png') }}" alt="Kabupaten Langkat" class="w-14 rounded-lg">
                                        <div class="">
                                            <h1 class="font-semibold text-white text-xl">Kapubaten</h1>
                                            <h1 class="font-semibold text-white text-xl">Langkat</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="w-full max-w-md mx-auto px-4 py-8 h-full">
                            {{ $slot }}
                        </div>

                    </div>

                </div>

                <!-- Image -->
                {{-- <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
                    <img class="object-cover object-center w-full h-full" src="{{ asset('images/auth-image.jpg') }}" width="760" height="1024" alt="Authentication image" />
                    <img class="absolute top-1/4 left-0 -translate-x-1/2 ml-8 hidden lg:block" src="{{ asset('images/auth-decoration.png') }}" width="218" height="224" alt="Authentication decoration" />
                </div> --}}

            </div>

        </main>        
    </body>
</html>
