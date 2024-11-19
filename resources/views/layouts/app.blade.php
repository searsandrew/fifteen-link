<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            @if (session('status'))
                <div x-data="{ show: true }" x-show="show" class="w-80 absolute top-3 right-3 bg-white p-6 rounded-lg shadow-lg border-2 border-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" @click="show = false" fill="currentColor" class="text-slate-200 hover:text-red-400 size-5 absolute top-2 right-2 cursor-pointer" viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                    </svg>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto">
                <div class="py-12">
                    <div class="flex items-start space-x-6 sm:px-6 lg:px-8">
                        <section class="flex-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            {{ $slot }}
                        </section>
                        <aside class="flex-0 w-1/4">
                            <h3 class="text-xl text-slate-900">{{ __('form.instruction.title') }}</h3>
                            <span class="text-sm leading-wide">{{ __('form.instruction.body') }}</span>
                            <form method="POST" action="{{ route('link.store') }}" class="flex flex-col space-y-3">
                                @csrf
                                <div>
                                    <x-input-label for="destination" :value="__('form.destination.label')" />
                                    <x-text-input id="destination" class="block mt-1 w-full" type="text" name="destination" :value="old('destination')" required autofocus autocomplete="destination" />
                                    <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                                </div>
                                <div class="flex">
                                    <x-primary-button>{{ __('form.submit') }}</x-primary-button>
                                </div>
                            </form>
                        </aside>
                    </div>
                </div>
            <div class="ml-6 text-xs text-slate-400">{{ __('dashboard.developed') }} <a href="https://www.mayfifteenth.com/" class="hover:text-emerald-700">Mayfifteenth</a>.</div>
            </main>
        </div>
    </body>
</html>
