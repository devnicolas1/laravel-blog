<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nicolas Freitas | Desenvolvedor Backend com PHP Laravel</title>
    @vite('resources/js/app.js')
</head>
<body class="bg-gradient-to-r from-blue-900 to-slate-900 w-screen h-screen flex justify-center items-center text-center">
    <div class="text-white">
        <div>
            <h1 class="text-7xl font-medium">
                Oi! Eu sou o Nicolas.
            </h1>
            <p class="text-3xl mt-3">
                Sou um desenvolvedor backend, atualmente focado em PHP Laravel.
            </p>
            <div>
                <a href="" class="mx-2">
                    <img src="{{ asset('images/githubIcon.png') }}" alt="GitHub Link" width="4%" class="mt-1" style="display: inline;">
                </a>
                <a href="" class="mx-2">
                    <img src="{{ asset('images/linkedinIcon.png') }}" alt="GitHub Link" width="4%" class="mt-1" style="display: inline;">
                </a>
            </div>
            <div class="mt-5">
                <a href="{{ route('blog.index') }}" class="bg-transparent hover:bg-emerald-600 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded transition">
                    Acesse meu blog
                </a>
            </div>
        </div>
    </div>
</body>
</html>