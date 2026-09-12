@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-[#073E81] mb-6 text-center">Crear Nuevo Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Título -->
        <div>
            <label for="title" class="block text-lg font-semibold text-gray-700">Título</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81] @error('title') border-red-500 @enderror"
                value="{{ old('title') }}"
            >
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contenido -->
        <div>
            <label for="content" class="block text-lg font-semibold text-gray-700">Contenido</label>
            <textarea 
                name="content" 
                id="content" 
                rows="6" 
                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81] @error('content') border-red-500 @enderror"
            >{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Imagen -->
        <div>
            <label for="image" class="block text-lg font-semibold text-gray-700">Imagen (opcional)</label>
            <input 
                type="file" 
                name="image" 
                id="image"
                class="mt-2 block w-full p-2 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81] @error('image') border-red-500 @enderror"
            >
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- SEO -->
        <div class="border-t pt-6 mt-2">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">SEO (opcional)</h2>
            <div class="space-y-4">
                <div>
                    <label for="meta_title" class="block text-sm font-semibold text-gray-600">Meta título</label>
                    <input
                        type="text"
                        name="meta_title"
                        id="meta_title"
                        maxlength="255"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81] @error('meta_title') border-red-500 @enderror"
                        value="{{ old('meta_title') }}"
                        placeholder="Si se deja vacío, se usa el título del post"
                    >
                    @error('meta_title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="meta_description" class="block text-sm font-semibold text-gray-600">Meta descripción</label>
                    <textarea
                        name="meta_description"
                        id="meta_description"
                        rows="2"
                        maxlength="320"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#073E81] focus:border-[#073E81] @error('meta_description') border-red-500 @enderror"
                        placeholder="Si se deja vacío, se genera automáticamente del contenido"
                    >{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Botones -->
        <div class="flex justify-center space-x-4">
            <button type="submit" class="px-6 py-3 bg-[#073E81] text-white font-semibold rounded-lg hover:bg-blue-900 transition">
                Guardar
            </button>
            <a href="{{ route('admin.posts.index') }}" class="px-6 py-3 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection

