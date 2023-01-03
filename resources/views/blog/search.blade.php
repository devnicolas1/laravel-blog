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
        <div class="mt-2 text-center">
            <h2 class="text-5xl font-montserrat text-white">
                Resultados
            </h2>
        </div>
        <div class="mx-10">
            <div class="grid custom-grid-cols">
                @foreach ($results as $post)
                <article class="mx-2 py-3 px-2 my-2 bg-white rounded-md flex flex-row">
                    <img src="{{ asset($post->image_path) }}" alt="" srcset="" width="25%">
                    <div class="ml-2 flex flex-col">
                        <a href="{{ route('blog.show', $post->id) }}" class="text-3xl font-montserrat font-semibold hover:text-blue-900 hover:border-b-2 hover:border-blue-900 transition self-start">
                            {{ $post->title }}
                        </a>
                        <small class="block text-xs mt-1">Publicado em {{ $post->created_at->format('d/m/Y') }}</small>
                        <p class="text-sm my-4">
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
    </main>
</body>
</html>