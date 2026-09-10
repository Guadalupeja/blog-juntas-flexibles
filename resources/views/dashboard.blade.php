@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard</h1>

        @if(Auth::user()->role === 'admin')
            <div class="mt-5 p-5 bg-gray-100 dark:bg-gray-800 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-white">Panel de Administración</h2>
                <ul class="mt-2">
                    <li><a href="{{ route('admin.posts.index') }}" class="text-blue-500 hover:underline">Gestionar Posts</a></li>
                    <li><a href="{{ route('admin.posts.create') }}" class="text-blue-500 hover:underline">Crear Nuevo Post</a></li>
                </ul>
            </div>
        @else
            <p class="mt-2 text-gray-600 dark:text-gray-400">No tienes permisos de administrador.</p>
        @endif
    </div>
@endsection
