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
        <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <input type="text" name="title" id='title' placeholder="Título" class="w-full h-10 text-2xl my-2 p-1 rounded bg-slate-100" value="{{ $post->title }}">
            <input type="text" name="excerpt" id='excerpt' placeholder="Excerto" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100" value="{{ $post->excerpt }}">
            <textarea name="body" id="body" class="w-full h-80 my-2 p-1 rounded bg-slate-100" placeholder="Hora de escrever!">{{ $post->body }}</textarea>

            <input type="text" name="metaTitle" id='metaTitle' placeholder="Meta Title" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100" value="{{ $post->metaTitle }}">
            <input type="text" name="metaDescription" id='metaDescription' placeholder="Meta Description" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100" value="{{ $post->metaDescription }}">
            <input type="text" name="metaKeywords" id='metaKeywords' placeholder="Meta Keywords" class="w-full h-10 text-1xl my-2 p-1 rounded bg-slate-100" value="{{ $post->metaKeywords }}">

            <button class="py-2 px-8 text-white rounded bg-emerald-600 transition mb-2 font-semibold hover:bg-white hover:text-blue-900">Editar</button>
        </form>
    </div>
</x-app-layout>