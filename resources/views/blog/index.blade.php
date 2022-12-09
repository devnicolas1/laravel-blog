<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nicolas Freitas | Blog</title>
    @vite('resources/js/app.js')
</head>
<body class="font-roboto bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900">
    <header class="flex justify-items-start items-center px-10 py-1 bg-white text-slate-900 font-semibold">
        <a href="{{ route('home') }}" class="mx-2 hover:bg-blue-900 hover:text-white px-4 py-0.5 rounded-sm transition">
            Página Inicial
        </a>
        <a href="{{ route('blog.index') }}" class="mx-2 hover:bg-blue-900 hover:text-white px-4 py-0.5 rounded-sm transition">
            Blog
        </a>
    </header>
    <main class="mt-5">
        <div class="mx-6 text-white">
            <div class="mt-3 text-center mb-1">
                <h1 class="text-5xl font-montserrat border-b-2 py-2 border-white font-medium">
                    Últimos posts
                </h1>
            </div>
            <div class="grid grid-cols-2" style="border: 2px solid red;">
                @foreach ($twoLatestPosts as $post)
                <article class="mx-2 py-3 px-2 bg-blue-900 rounded-md flex flex-row">
                    <img src="{{ asset($post->image_path) }}" alt="" srcset="" width="25%">
                    <div class="ml-2 flex flex-col" style="border: 2px solid red">
                        <a href="{{ route('blog.show', $post->id) }}" class="text-3xl font-montserrat transition hover:border-b-2 hover:border-white font-semibold">
                            {{ $post->title }}
                        </a>
                        <small class="block text-xs mt-1">Publicado em {{ $post->created_at->format('d/m/Y') }}</small>
                        <p class="text-sm my-4">
                            {{ $post->excerpt }}
                        </p>
                        <a href="{{ route('blog.show', $post->id) }}" class="hover:bg-emerald-600 px-3 py-1 bg-slate-900 text-white transition font-montserrat font-medium rounded-sm self-end justify-end">
                            Ler agora
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </main>
    <div class="mt-2 text-center">
        <h2 class="text-5xl font-montserrat">
            Todos os posts
        </h2>
        <form action="{{ route('blog.search') }}" method="GET">
            <label for="searchString">Pesquisar post</label>
            <input type="text" placeholder="Pesquisar post" name="searchString" id="searchString">
            <button type="submit" class="px-3 py-1 bg-blue-900 text-white">Pesquisar</button>
        </form>
    </div>
    <div class="mx-10">
        <div class="grid grid-cols-2">
            @foreach ($allPosts as $post)
            <article>
                <div class="border-b-2 rounded-sm border-slate-400 py-3">
                    <a href="{{ route('blog.show', $post->id) }}" class="text-3xl font-montserrat font-medium hover:text-blue-900 hover:border-b-2 hover:border-blue-900 transition">
                        {{ $post->title }}
                    </a>
                    <small class="block text-xs mt-1">Publicado em {{ $post->created_at->format('d/m/Y') }}</small>
                    <p class="text-sm my-4">
                        {{ $post->excerpt }}
                    </p>
                    <a href="{{ route('blog.show', $post->id) }}" class="hover:bg-emerald-600 hover:text-white px-3 py-1 bg-slate-900 text-white transition font-montserrat font-medium rounded-sm">
                        Ler agora
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</body>
</html>