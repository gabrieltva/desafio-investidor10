<x-layout>
    <x-slot:title>
        Notícia: {{ $news->title }}
    </x-slot:title>

    <div class="flex flex-col gap-3">
        <h1 class="text-4xl text-white">{{ $news->title }}</h1>
        <div class="text-xs italic text-zinc-400">Data: {{ \Carbon\Carbon::parse($news->date)->format('d/m/Y') }} | Categoria: {{ $category->title }}</div>
        <hr class="border-zinc-500">

        <div class="text-white flex flex-col gap-2">
            {!! nl2br($news->content) !!}
        </div>
    </div>
</x-layout>