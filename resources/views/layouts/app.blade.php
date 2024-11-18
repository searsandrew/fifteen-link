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

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="flex items-start max-w-7xl mx-auto space-x-6 sm:px-6 lg:px-8">
                        <section class="flex-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            {{ $slot }}
                        </section>
                        <aside class="w-1/4">
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
            </main>
        </div>
    </body>
</html>
