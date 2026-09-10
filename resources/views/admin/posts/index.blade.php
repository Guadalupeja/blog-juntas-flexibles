@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-[#073E81] mb-6 text-center">Listado de Posts</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.posts.create') }}" class="bg-[#073E81] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
            Crear Nuevo Post
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-[#073E81] text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Título</th>
                    <th class="py-3 px-4 text-left">Slug</th>
                    <th class="py-3 px-4 text-left">Fecha</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $post->title }}</td>
                        <td class="py-3 px-4">{{ $post->slug }}</td>
                        <td class="py-3 px-4">{{ $post->created_at->format('Y-m-d') }}</td>
                        <td class="py-3 px-4 flex justify-center gap-3">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                                Editar
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No hay posts creados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection

