<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($news as $item)
        <x-list-news title="{{ $newsItem->title }}" description="{{ Str::of($newsItem->content)->limit(200) }}" link="/news/show/{{ $newsItem->slug }}" />
        @endforeach
    </div>
</x-layout>