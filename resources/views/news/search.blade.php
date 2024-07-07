<x-layout>
    <div class="flex flex-col gap-8">
        <h1 class="text-2xl text-white">Busca por: "{{ $search }}"</h1>
        <hr class="border-zinc-500">

        @if ($news->isEmpty())
        <p>Nenhuma notícia encontrada.</p>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($news as $newsItem)
            <x-list-news title="{{ $newsItem->title }}" description="{{ Str::of($newsItem->content)->limit(200) }}" link="/news/show/{{ $newsItem->slug }}" />
            @endforeach
        </div>
        @endif
    </div>
</x-layout>