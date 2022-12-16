<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $post->metaDescription }}">
    <meta name="keywords" content="{{ $post->metaKeywords }}">
    <title>{{ $post->metaTitle }}</title>
    @vite('resources/js/app.js')
</head>
<body class="text-white font-roboto bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900">
    <header class="flex justify-items-start items-center px-10 py-1 bg-white text-slate-900 font-semibold">
        <a href="{{ route('home') }}" class="mx-2 hover:bg-blue-900 hover:text-white px-4 py-0.5 rounded-sm transition">
            Página Inicial
        </a>
        <a href="{{ route('blog.index') }}" class="mx-2 hover:bg-blue-900 hover:text-white px-4 py-0.5 rounded-sm transition">
            Blog
        </a>
    </header>
    <main class="text-center px-10 my-4 font-roboto">
        <article>
            <h1 class="text-5xl font-montserrat">{{ $post->title }}</h1>
            <h2 class="italic font-montserrat mt-1">{{ $post->excerpt }}</h2>
            <small class="mt-1">Publicado em {{ $post->created_at->format('d/m/Y') }}</small>
            <hr class="border-t-2 border-blue-900">
            <p class="text-left mt-3 px-3 text-breaker">{{ $post->body }}</p>
        </article>
    </main>
</body>
</html>