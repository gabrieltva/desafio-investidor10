<x-layout>
    <div class="flex flex-col gap-3">
        <h1 class="text-4xl text-white">{{ $news->title }}</h1>
        <hr class="border-zinc-500">
        <div class="text-xs italic text-zinc-100">{{ \Carbon\Carbon::parse($news->date)->format('d/m/Y') }}</div>
    
        <div class="text-white flex flex-col gap-2">
            {!! $news->content !!}
        </div>
    </div>
</x-layout>