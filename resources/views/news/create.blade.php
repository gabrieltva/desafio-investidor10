<x-layout title="Registrar nova notícia">
    <div class="flex flex-col gap-3">
        <h1 class="text-4xl text-white">Registrar nova notícia</h1>
        <hr class="border-zinc-500">

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            <strong class="font-bold">Ops!</strong>
            <span class="block sm:inline">Existe alguns erros nos campos enviados:</span>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="title">Título</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="content">Conteúdo</label>
                <textarea name="content" id="content" rows="8" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="date">Data</label>
                <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('date') }}">
            </div>

            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="id_category">Categoria</label>
                <select name="id_category" id="id_category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('id_category') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="mt-4 px-12 bg-lime-400 hover:bg-lime-700 text-black font-bold py-2 rounded-full focus:outline-none focus:shadow-outline">Cadastrar</button>
            </div>
        </form>
    </div>
</x-layout>