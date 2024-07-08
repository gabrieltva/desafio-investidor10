<div class="p-6 flex flex-col gap-4 rounded-lg bg-zinc-600 shadow">
    <a href="{{ $link }}" class="text-xl text-white hover:underline">{{ $title }}</a>
    <p class="text-white">{{ Str::of($description)->limit(150) }}</p>

    <a href="{{ $link }}" class="text-center focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 bg-zinc-800 text-white border-zinc-600 hover:bg-zinc-700 hover:border-zinc-600 focus:ring-zinc-700">Acessar</a>
</div>