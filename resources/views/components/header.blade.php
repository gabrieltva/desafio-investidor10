<header class="bg-zinc-900 py-4 shadow fixed w-screen">
    <div class="container mx-auto flex column justify-between">
        <a href="{{ url('/') }}" class="px-3 text-xl text-white transition hover:scale-110">{{ config("app.name") }}</a>
        
        <ul class="unstyled items-center gap-4 lg:gap-6 hidden md:flex">
            <li>
                <a href="{{ url('/register-news') }}" class="text-white hover:text-zinc-200 transition">Cadastrar notícia</a>
            </li>
            <li>
                <a href="{{ url('/') }}" class="text-white hover:text-zinc-200 transition">Exibir notícias</a>
            </li>
            <li>
                <form id="search" class="relative" action="{{ url('/search-news') }}" method="GET">
                    <input name="s" type="text" class="rounded-full ps-4 pe-8 py-1 outline-none focus:bg-zinc-200 transition">
                </form>
            </li>
        </ul>
    </div>
</header>