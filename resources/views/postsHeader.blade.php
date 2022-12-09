<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="mx-1">
    Todos
</x-nav-link>
<x-nav-link :href="route('blog.create')" :active="request()->routeIs('blog.create')" class="mx-1">
    Criar
</x-nav-link>