<x-app-layout>
    <x-slot name="header">
        @include('categoriesHeader')
    </x-slot>

    <div class="my-6 mx-6 rounded-lg text-center">
        <div class="bg-white mx-2 px-4 py-2 rounded-lg">
            <h2 class="font-montserrat text-3xl">
                Criar categoria
            </h2>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="category" id='category' placeholder="Categoria" class="w-full h-8 text-1xl my-2 p-1 rounded bg-slate-100">
                
                <button class="py-2 px-8 text-white rounded bg-blue-900 transition mb-2 font-semibold hover:bg-emerald-600">Criar</button>
            </form>
        </div>
    </div>

    <div class="my-6 mx-6 rounded-lg text-center grid grid-cols-4">
        @foreach ($categories as $category)
        <div class="bg-white mx-2 px-4 py-2 rounded-lg mt-2">
            <h2 class="font-montserrat text-2xl mt-1 mb-2">
                {{ $category->category }}
            </h2>
            <a href="{{ route('categories.edit', $category->id) }}" class="px-4 py-1 bg-yellow-500 text-white mx-1 rounded-md hover:bg-yellow-700 transition">
                Editar
            </a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="px-4 py-1 bg-red-500 text-white mx-1 rounded-md hover:bg-red-800 transition" type="submit">
                    Excluir
                </button>
            </form>
        </div>
        @endforeach
    </div>
</x-app-layout>
