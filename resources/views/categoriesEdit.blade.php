<x-app-layout>
    <x-slot name="header">
        @include('categoriesHeader')
    </x-slot>

    <div class="my-6 mx-6 rounded-lg text-center">
        <div class="bg-white mx-2 px-4 py-2 rounded-lg">
            <h2 class="font-montserrat text-3xl">
                Editar
            </h2>
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="text" name="category" id='category' placeholder="Categoria" class="w-full h-8 text-1xl my-2 p-1 rounded bg-slate-100" value="{{ $category->category }}">
                
                <button class="py-2 px-8 text-white rounded bg-blue-900 transition mb-2 font-semibold hover:bg-emerald-600">Editar</button>
            </form>
        </div>
    </div>
</x-app-layout>
