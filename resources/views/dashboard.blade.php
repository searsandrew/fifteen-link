<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.dashboard') }}
        </h2>
    </x-slot>

    @forelse(Auth::user()->links as $link)

    @empty
        <span class="flex flex-col w-full text-center">
            <h1 class="text-2xl text-slate-900">{{ __('dashboard.link.title.not-found') }}</h1>
            <span class="text-md leading-wide">{{ __('dashboard.link.body.not-found') }}</span>
        </span>
    @endforelse
</x-app-layout>
