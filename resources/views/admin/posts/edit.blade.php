@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-[#073E81] mb-6 text-center">Editar Post</h1>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
    
        <!-- Título -->
        <div>
            <label for="title" class="block text-lg font-semibold text-gray-700">Título</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" 
                   class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81]">
        </div>
    
        <!-- Contenido -->
        <div>
            <label for="content" class="block text-lg font-semibold text-gray-700">Contenido</label>
            <textarea name="content" id="content" rows="5" 
                      class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81]">{{ $post->content }}</textarea>
        </div>
    
        <!-- Imagen actual -->
        <div>
            <label class="block text-lg font-semibold text-gray-700">Imagen Actual</label>
            
            @if($post->image)
            <img src="{{ asset($post->image) }}" alt="Imagen actual" class="w-48 h-auto rounded-md border border-gray-300 shadow-md">
            @else
                <p class="text-gray-500 italic">No hay imagen disponible.</p>
            @endif
        </div>
        
        <!-- Subir nueva imagen -->
        <div>
            <label for="image" class="block text-lg font-semibold text-gray-700">Subir Nueva Imagen</label>
            <input type="file" name="image" id="image" 
                   class="mt-2 block w-full p-2 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81]">
        </div>
    
        <!-- Botón de enviar -->
        <div class="text-center">
            <button type="submit" class="px-6 py-3 bg-[#073E81] text-white font-semibold rounded-lg hover:bg-blue-900 transition">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
