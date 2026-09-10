<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Blog Juntas Flexibles') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>


                    
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>



        <footer>
            <section class="bg-blue-900 font-roboto mt-5" data-id="a4a4df0" data-element_type="section">
                <div class="flex flex-wrap">
                    <!-- Primera columna del footer -->
                    <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                        <div>
                            <a href="{{ url('/') }}" class="block">
                                <img src="{{ asset('img/logo-bsh-white.png.webp')}}" alt="Bombas centrifugas, Sellos hidráulicos, hules industriales – BSH" width="640" height="480" class="w-64 h-auto p-4">
                            </a>
                        </div>
                        
                        <div class="h-4"></div>
                        <div class="p-12">
                            <p class="text-white text-sm leading-[1.8] text-justify">Juntas de Expansión de Hules 
                                convenciones y especiales para cualquier industria. Fabricamos sobre especificación o diseño.</p>
                        </div>
                        <div class="h-4"></div>
                        <div class="p-4">
                            <div class="flex justify-center">
                                <a href="https://www.facebook.com/Bombas-Sellos-y-Hules-Industriales-SA-de-CV-116434456400428" target="_blank" class="inline-flex items-center justify-center text-gray-400 hover:text-gray-600 transition duration-300 ease-in-out no-underline ml-4">
                                    <span class="sr-only">Facebook</span>
                                    <i class="fa-brands fa-facebook text-gray-400 text-3xl"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/bombas-sellos-y-hules-industriales-bsh" target="_blank" class="inline-flex items-center justify-center text-gray-400 hover:text-gray-600 transition duration-300 ease-in-out no-underline ml-4">
                                    <span class="sr-only">Linkedin-square</span>
                                    <i class="fa-brands fa-linkedin text-gray-400 text-3xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
    <!-- Segunda columna del footer -->
    <div class="w-full md:w-1/2 lg:w-1/3 p-4">
        <div class="p-4">
            <div class="text-2xl font-semibold text-white p-4">MAPA DEL SITIO</div>
        </div>
    
        <div class="p-4">
            <!-- Botón para desplegar el Mapa del Sitio -->
            <button id="toggle-sitemap" type="button" class="block md:hidden text-white" aria-label="Toggle sitemap">
                <i class="fas fa-bars"></i> <!-- Icono de menú -->
            </button>
            
            <!-- Contenedor del Mapa del Sitio -->
            <div id="sitemap-items" class="hidden md:block">
                <ul class="text-white">
                    <li><a href="{{ url('/') }}" class="text-sm">INICIO</a></li>
                    <li><a href="{{ url('#materiales') }}" class="text-sm">MATERIALES DE LAS JUNTAS</a></li>
                    <li><a href="{{ url('selecciona-juntas-de-expansion') }}" class="text-sm">HERRAMIENTA DE SELECCIÓN</a></li>
                    <li><a href="{{ url('#movimientos') }}" class="text-sm">MOVIMIENTOS</a></li>
                    <li><a href="{{ url('estilos-juntas-de-expansion-bsh') }}" class="text-sm">ESTILOS</a></li>
                    <li><a href="{{ url('https://www.bombasellos.com.mx/somos-bsh') }}" class="text-sm">NOSOTROS</a></li>
                    <li><a href="{{ url('https://www.bombasellos.com.mx/contacto') }}" class="text-sm">CONTACTO</a></li>
                    <li><a href="{{ url('blog') }}" class="text-sm">BLOG</a></li>
                </ul>
            </div>
        </div>
    
        <div class="p-4">
            <p><a href="{{ url('aviso-de-privacidad') }}" class="text-sm text-white">AVISO DE PRIVACIDAD</a></p>
        </div>
    </div>
    
                    <!-- Tercera columna del footer -->
                    <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                        <div class="p-4">
                            <div class="text-xl font-semibold text-white p-4">CONTACTO</div>
                        </div>
                        <div class="p-4">
                            <p class="text-white">
                                <span>-Nombre: Bombas Sellos y Hules Industriales SA de CV.</span><br>
                                <span>-Abreviado: BSH SA de CV.</span><br>
                                <span>-Dirección: Avenida 125 Oriente #226, Guadalupe Hidalgo. Puebla. C.P. 72494.</span><br>
                                <span>-Teléfonos:</span><br>
                                <span>(55)5752-1715</span><br>
                                <span>(22)2227-3866</span><br>
                                <span>(83)3246-2205</span><br>
                                <span>(83)3239-5885</span><br>
                                <span><a href="mailto:bsh@bombasellos.com.mx" class="">-Correo electrónico: bsh@bombasellos.com.mx</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
    
            <!-- Barra de derechos -->
            <div class="border-t border-gray-500"></div>
    
            <!-- Derechos de autor -->
            <section class="bg-blue-900 py-8">
                <div class="container mx-auto flex flex-wrap">
                    <!-- Primera mitad -->
                    <div class="w-full md:w-1/2 px-4">
                        <div class="text-gray-700">
                            <p class="text-base text-gray-400">&copy; {{ date('Y') }} - Todos los derechos reservados. Bombas Sellos y Hules Industriales S.A. de C.V.</p>
                        </div>
                    </div>
                    <!-- Segunda mitad -->
                    <div class="w-full md:w-1/2 px-4">
                        <div class="text-gray-700 text-right">
                            <p class="text-base text-white">LUN – VIE: 9.00 – 18.00&nbsp; SAB/SUN: CLOSED</p>
                        </div>
                    </div>
                </div>
            </section>
        </footer>




    </body>
</html>
