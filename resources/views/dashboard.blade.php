<x-app-layout>
    <div class="grid grid-cols-5 gap-x-3">
        @forelse(Auth::user()->links as $link)
            @if ($loop->first)
                <div class="col-span-5 grid grid-cols-5 gap-3 bg-slate-500 text-slate-50 text-xs uppercase tracking-widest">
                    <span class="col-span-2 px-2 py-1">{{ __('dashboard.link.table.destination') }}</span>
                    <span class="px-2 py-1">{{ __('dashboard.link.table.reference') }}</span>
                    <span class="px-2 py-1 text-center">{{ __('dashboard.link.table.stats') }}</span>
                    <span class="px-2 py-1 text-right">{{ __('dashboard.link.table.tools') }}</span>
                </div>
            @endif
            <a class="col-span-2 px-2 py-3 truncate hover:underline decoration-dotted hover:text-emerald-600" href="{{ $link->destination }}" target="_new">{{ $link->destination }}</a>
            <span class="px-2 py-3 flex flex-row items-center justify-between">
                <span>{{ $link->ref_id }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-5 text-slate-100" viewBox="0 0 512 512">
                    <!--!Font Awesome Pro 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc.-->
                    <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM357.8 139.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-21.4 21.4-71-71 21.4-21.4c15.6-15.6 40.9-15.6 56.6 0zM151.9 289L257.1 183.8l71 71L222.9 359.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/>
                </svg>
            </span>
            <span class="flex items-center justify-evenly">
                <span class="flex flex-col space-y-0 text-center">
                    <span>{{ $link->visitLogs()->count() }}</span>
                    <small class="text-xs">{{ __('dashboard.link.count.total') }}</small>
                </span>
                <span class="flex flex-col space-y-0 text-center">
                    <span>{{ $link->visitLogs()->distinct('ip')->count('ip') }}</span>
                    <small class="text-xs">{{ __('dashboard.link.count.unique') }}</small>
                </span>
            </span>
            <span class="px-2 py-3 flex flex-row space-x-3 items-center justify-end">
                <a href="{{ route('link.show', $link) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-5 text-slate-300 cursor-pointer hover:text-emerald-400" viewBox="0 0 576 512">
                        <!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                    </svg>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-5 text-slate-300 cursor-pointer hover:text-emerald-400" viewBox="0 0 448 512" onclick="navigator.clipboard.writeText('{{ route('redirect', $link->ref_id) }}')">
                    <!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M208 0L332.1 0c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9L448 336c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48zM48 128l80 0 0 64-64 0 0 256 192 0 0-32 64 0 0 48c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 176c0-26.5 21.5-48 48-48z"/>
                </svg>
                <form method="POST" action="{{ route('link.destroy', $link) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-5 text-slate-300 cursor-pointer hover:text-red-400" viewBox="0 0 448 512">
                            <!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                        </svg>
                    </button>
                </form>
            </span>

        @empty
            <span class="p-6 col-span-5 flex flex-col w-full text-center">
                <h1 class="text-2xl text-slate-900">{{ __('dashboard.link.not-found.title') }}</h1>
                <span class="text-md leading-wide">{{ __('dashboard.link.not-found.body') }}</span>
            </span>
        @endforelse
    </div>
</x-app-layout>
