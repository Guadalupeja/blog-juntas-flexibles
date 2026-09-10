<!-- Menú de Navegación -->
<header class="w-full bg-white shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        
        <!-- Logo -->
        <div class="flex items-center">
            <a href="https://juntasflexibles.com/">
                <img src="{{ asset('img/log-bsh-final-01-1-256x92.png') }}"
                    alt="Juntas de Expansión | BSH"
                    class="h-12 w-auto">
            </a>
        </div>


        <!-- Menú de Navegación en Pantallas Grandes -->
        <nav class="hidden md:flex space-x-6 text-[13px]">
            <a href="https://juntasflexibles.com/" class="text-[#073E81] hover:text-blue-500 font-semibold">JUNTAS FLEXIBLES</a>
            <a href="#materiales" class="text-[#073E81] hover:text-blue-500 font-semibold">MATERIALES</a>
            <a href="https://juntasflexibles.com/selecciona-juntas-de-expansion/" class="text-[#073E81] hover:text-blue-500 font-semibold">HERRAMIENTA DE SELECCIÓN</a>
            <a href="#movimientos" class="text-[#073E81] hover:text-blue-500 font-semibold">MOVIMIENTOS</a>
            <a href="https://juntasflexibles.com/estilos-juntas-de-expansion-bsh" class="text-[#073E81] hover:text-blue-500 font-semibold">ESTILOS</a>
            <a href="https://www.bombasellos.com.mx/somos-bsh/" target="_blank" class="text-[#073E81] hover:text-blue-500 font-semibold">NOSOTROS</a>
            <a href="https://www.bombasellos.com.mx/contacto/" target="_blank" class="text-[#073E81] hover:text-blue-500 font-semibold">CONTACTO</a>
            <a href="https://juntasflexibles.com/blog/" class="text-[#073E81] hover:text-blue-500 font-semibold">BLOG</a>
        </nav>

        <!-- Botón Cotizar Ahora (Pantallas Grandes) -->
        <div class="hidden md:flex">
            <a href="https://juntasflexibles.com/contact"
                class="px-4 py-2 bg-[#610001] text-white font-semibold rounded-lg hover:bg-blue-900 transition">
                COTIZAR AHORA
            </a>
        </div>

        <!-- Botón Menú Móvil -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-[#073E81] focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menú Desplegable para Móviles -->
    <div id="mobile-menu" class="hidden md:hidden flex flex-col items-center space-y-3 bg-white py-4 shadow-lg">
        <a href="https://juntasflexibles.com/" class="text-[#073E81] hover:text-blue-500 font-semibold">INICIO</a>
        <a href="https://juntasflexibles.com/#materiales" class="text-[#073E81] hover:text-blue-500 font-semibold">MATERIALES</a>
        <a href="https://juntasflexibles.com/selecciona-juntas-de-expansion/" class="text-[#073E81] hover:text-blue-500 font-semibold">HERRAMIENTA DE SELECCIÓN</a>
        <a href="#movimientos" class="text-[#073E81] hover:text-blue-500 font-semibold">MOVIMIENTOS</a>
        <a href="https://juntasflexibles.com/estilos-juntas-de-expansion-bsh" class="text-[#073E81] hover:text-blue-500 font-semibold">ESTILOS</a>
        <a href="https://www.bombasellos.com.mx/somos-bsh/" target="_blank" class="text-[#073E81] hover:text-blue-500 font-semibold">NOSOTROS</a>
        <a href="https://www.bombasellos.com.mx/contacto/" target="_blank" class="text-[#073E81] hover:text-blue-500 font-semibold">CONTACTO</a>
        <a href="https://juntasflexibles.com/blog/" class="text-[#073E81] hover:text-blue-500 font-semibold">BLOG</a>
        <a href="#contacto"
            class="bg-[#073E81] text-white font-semibold px-4 py-2 rounded-lg text-center hover:bg-blue-900">
            COTIZAR AHORA
        </a>
    </div>
</header>

<!-- Script para el Menú Móvil -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

  



<nav x-data="{ open: false }" class="bg-white font-roboto text-[#073E81] dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('blog.index')" :active="request()->routeIs('blog.index')">
                        {{ __('Blog') }}
                    </x-nav-link>

                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.index')">
                            {{ __('Administrar Posts') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.posts.create')" :active="request()->routeIs('admin.posts.create')">
                            {{ __('Agregar Post') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown (No se muestra en el blog) -->
            @if (!request()->routeIs('blog.index') && !request()->routeIs('blog.show'))
                <div class="hidden sm:flex sm:items-center sm:ms-6 text-[#073E81]">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                @if(Auth::check())
                                    <div>{{ Auth::user()->name }}</div>
                                @else
                                    <div>Invitado</div>
                                @endif
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::check())
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @endif
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('blog.index')" :active="request()->routeIs('blog.index')">
                {{ __('Blog') }}
            </x-responsive-nav-link>

            @if(Auth::check() && Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.index')">
                    {{ __('Administrar Posts') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.posts.create')" :active="request()->routeIs('admin.posts.create')">
                    {{ __('Agregar Post') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        @if (!request()->routeIs('blog.index') && !request()->routeIs('blog.show'))
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    @if(Auth::check())
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    @endif
                </div>

                <div class="mt-3 space-y-1">
                    @if(Auth::check())
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    @endif
                </div>
            </div>
        @endif
    </div>
</nav>




@php
    $dayOfWeek = now()->isoWeekday(); // 1 = Lunes, 7 = Domingo
    $hour = now()->hour;
    // Lógica: mostrar el botón solo L-V de 9:00 a 18:00
    $showWhatsApp = ($dayOfWeek >= 1 && $dayOfWeek <= 5 && $hour >= 9 && $hour < 18);
@endphp

@if($showWhatsApp)
    <div class="fixed bottom-4 right-4 z-50">
        <a href="https://wa.me/5218332395885?text=Hola%20Necesito%20más%20información%20sobre%20sus%20juntas" 
           target="_blank" 
           class="flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full shadow-lg transition"
           title="Chatea con nosotros vía WhatsApp"
        >
            <!-- Ícono WhatsApp con SVG -->
            <svg class="w-7 h-7 mr-2 fill-current" viewBox="0 0 32 32">
                <path d="M16.003 3.002c-7.182 0-13 5.818-13 13 0 2.304.605 4.472 1.655 6.345l-1.898 5.852 6.019-1.583c1.763.973 3.789 1.536 5.917 1.536 7.182 0 13-5.818 13-13 0-7.181-5.818-13-13-13zm6.686 18.325c-.281.781-1.631 1.547-2.271 1.636-.61.079-1.388.109-2.252-.141-.52-.156-1.193-.387-2.061-.757-3.61-1.567-5.945-5.426-6.125-5.683-.179-.256-1.459-1.944-1.459-3.712 0-1.768.924-2.641 1.254-3 .33-.348.722-.435.963-.435.242 0 .482 0 .694.012.225.012.523-.084.82.625.307.72 1.048 2.496 1.139 2.676.09.18.153.389.045.623-.105.229-.158.369-.313.589-.158.217-.336.484-.48.651-.156.178-.316.372-.139.659.179.271.789 1.301 1.688 2.106 1.162 1.036 2.141 1.352 2.418 1.505.271.127.432.105.578-.06.144-.172.66-.77.834-1.035.179-.255.357-.223.6-.134.242.088 1.547.729 1.815.864.269.135.45.202.516.314.067.111.067.641-.213 1.422z" />
            </svg>
            Chatea con nosotros vía Whatsapp
        </a>
    </div>
@endif
