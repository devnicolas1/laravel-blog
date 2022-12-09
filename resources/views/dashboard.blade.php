<x-app-layout>
    <x-slot name="header">
        @include('postsHeader')
    </x-slot>

    <div class="mt-6">
        <div class="grid grid-cols-2">
            @foreach (Auth::user()->posts as $post)
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                    <div class="py-6 px-2 text-gray-900 text-center">
                        <h2 class="text-2xl">
                            <a href="{{ route('blog.show', $post->id) }}" class="hover:text-blue-900">
                                {{ Str::limit($post->title, 50, '...') }}
                            </a>
                        </h2>
                        <small class="block mb-1">Publicado em {{ $post->created_at->format('d/m/Y')}}</small>
                        <a href="{{ route('blog.edit', $post->id) }}" class="bg-emerald-600 px-3 py-1 hover:bg-slate-900 text-white transition font-montserrat font-medium rounded-sm mx-1">
                            Editar
                        </a>
                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-800 transition text-white font-montserrat font-medium rounded-sm px-3 py-0.5" type="submit">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
