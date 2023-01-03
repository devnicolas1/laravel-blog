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
            <div class="grid custom-grid-cols">
                @foreach ($twoLatestPosts as $post)
                <article class="mx-2 py-3 px-2 bg-blue-900 rounded-md flex flex-row my-2">
                    <img src="{{ asset($post->image_path) }}" alt="" srcset="" width="25%">
                    <div class="ml-2 flex flex-col">
                        <a href="{{ route('blog.show', $post->id) }}" class="h-1/4 text-3xl font-montserrat transition hover:border-b-2 hover:border-white font-semibold self-start">
                            {{ $post->title }}
                        </a>
                        <small class="block text-xs mt-1 h-1/6">Publicado em {{ $post->created_at->format('d/m/Y') }}</small>
                        <p class="text-sm my-4 h-2/4">
                            {{ $post->excerpt }}
                        </p>
                        <a href="{{ route('blog.show', $post->id) }}" class="hover:bg-emerald-600 px-3 py-1 bg-slate-900 text-white transition font-montserrat font-medium rounded-sm self-start">
                            Ler agora
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </main>
    <div class="mt-2 text-center mx-6">
        <h2 class="text-5xl font-montserrat font-medium text-white border-b-2 py-2 border-white">
            Todos os posts
        </h2>
        <form action="{{ route('blog.search') }}" method="GET" class="mt-3">
            <input type="text" placeholder="O que você quer aprender hoje?" name="searchString" id="searchString" class="text-white placeholder-gray-400 italic text-center border-2 border-white transition w-2/4 bg-transparent rounded-3xl">
            <div class="mt-2">
                <button class="bg-emerald-600 hover:bg-slate-900 transition text-white font-medium px-3 py-1 rounded-sm font-montserrat">Pesquisar</button>
            </div>
        </form>
    </div>
    <div class="mx-6 my-1">
        <div class="grid custom-grid-cols">
            @foreach ($allPosts as $post)
            @if ($post->id === $twoLatestPosts[0]['id'] || $post->id === $twoLatestPosts[1]['id'])
                @continue
            @endif
            <article class="mx-2 py-3 px-2 my-2 bg-white rounded-md flex flex-row">
                <img src="{{ asset($post->image_path) }}" alt="" srcset="" width="25%">
                <div class="ml-2 flex flex-col">
                    <a href="{{ route('blog.show', $post->id) }}" class="h-2/4 text-3xl font-montserrat font-semibold hover:text-blue-900 hover:border-b-2 hover:border-blue-900 transition self-start">
                        {{ $post->title }}
                    </a>
                    <small class="h-1/6 block text-xs mt-1">Publicado em {{ $post->created_at->format('d/m/Y') }}</small>
                    <p class="text-sm my-4 h-2/4">
                        {{ $post->excerpt }}
                    </p>
                    <a href="{{ route('blog.show', $post->id) }}" class="hover:bg-emerald-600 hover:text-white px-3 py-1 bg-slate-900 text-white transition font-montserrat font-medium rounded-sm self-start">
                        Ler agora
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</body>
</html>