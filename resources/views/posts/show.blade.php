@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title)
@section('meta_description', $post->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 160))

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">{{ $post->title }}</h1>

        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-60 object-cover mb-4">
            <p class="text-gray-700">{!! nl2br($post->content) !!}</p>

            <div class="mt-6">
                <a href="{{ route('blog.index') }}" class="text-blue-600">Volver al blog</a>
            </div>
        </div>
    </div>


    <div id="contacto" class="container mx-auto p-8 bg-[#000935]">
        <h2 class="font-roboto text-white m-5 text-[30px]">¿Necesitas más información sobre las juntas de expansión? <br>
         Por favor llena el siguiente formulario y en breve un experto se comunicará contigo:</h2>
    <div class="p-5">
       <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
       <script>
         window.onload = function() {
           var script = document.createElement('script');
           script.src = '//js.hsforms.net/forms/shell.js';
           script.charset = 'utf-8';
           script.type = 'text/javascript';
           script.onload = function() {
             hbspt.forms.create({
               region: "na1",
               portalId: "7547674",
               formId: "e391047b-0ba7-411a-85bc-4c528141e149"
             });
           };
           document.body.appendChild(script);
         };
    
    
    
    
         
       </script>
       </div>
    
    </div>






@endsection
