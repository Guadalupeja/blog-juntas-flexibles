@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Blog de Juntas de Expansión</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-bold">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="text-gray-600 mt-2">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-600 mt-4 inline-block">Leer más</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
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


