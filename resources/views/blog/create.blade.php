<x-app-layout>
    <x-slot name="header">
        @include('postsHeader')
    </x-slot>
    <div class="text-center mt-8 text-5xl">
        <h1 class="font-montserrat text-white">
            Criar novo post
        </h1>
    </div>
    <div class="px-20 mt-3">
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" id='title' placeholder="Título" class="w-full h-10 text-2xl my-2 p-1 rounded bg-slate-100">
            <input type="text" name="excerpt" id='excerpt' placeholder="Excerto" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100">
            <textarea name="body" id="body" class="w-full h-80 my-2 p-1 rounded bg-slate-100" placeholder="Hora de escrever!"></textarea>
            <div class="mb-2">
                <label class="w-44 flex cursor-pointer justify-center align-middle text-blue-900 rounded bg-white transition hover:bg-emerald-600 hover:text-white">
                        <span class="text-base leading-normal px-2 py-2 font-semibold">
                            Select a file
                        </span>
                    <input
                        type="file"
                        name="image_path"
                        class="hidden"
                        accept="image/*">
                </label>
            </div>

            <input type="text" name="metaTitle" id='metaTitle' placeholder="Meta Title" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100">
            <input type="text" name="metaDescription" id='metaDescription' placeholder="Meta Description" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100">
            <input type="text" name="metaKeywords" id='metaKeywords' placeholder="Meta Keywords" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100">

            <button class="py-2 px-8 text-white rounded bg-emerald-600 transition mb-2 font-semibold hover:bg-white hover:text-blue-900">Publicar</button>
        </form>
    </div>
</x-app-layout>