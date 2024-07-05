<header class="bg-zinc-900 py-4 shadow fixed w-screen">
    <div class="container mx-auto flex column justify-between">
        <a href="{{ url('/') }}" class="text-xl text-white">{{ config("app.name") }}</a>
        <ul class="unstyled flex gap-4 lg:gap-6">
            <li>
                <a href="{{ url('/register-news') }}" class="text-white hover:text-zinc-200 transition">Cadastrar notícia</a>
            </li>
            <li>
                <a href="{{ url('/') }}" class="text-white hover:text-zinc-200 transition">Exibir notícias</a>
            </li>
            <li>
                <form action="{{ url('/search-news') }}" method="GET">
                    <input name="s" type="text" class="rounded-full">
                </form>
            </li>
        </ul>
    </div>
</header>