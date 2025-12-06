<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Главная') }}
                    </x-nav-link>
                    <x-nav-link :href="route('materials.analytics')" :active="request()->routeIs('materials.analytics')">
                        {{ __('Аналитика') }}
                    </x-nav-link>
                    <x-nav-link :href="route('materials.risks')" :active="request()->routeIs('materials.risks')">
                        {{ __('Прогнозы и риски') }}
                    </x-nav-link>
                    <x-nav-link :href="route('consultations')" :active="request()->routeIs('consultations')">
                        {{ __('Консультация') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contacts')" :active="request()->routeIs('contacts')">
                        {{ __('Контакты') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('О нас') }}
                    </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div>
                    @auth
                        @group(1)
                        <a
                            href="{{ url('/admin') }}"
                            class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal"
                        >
                            Админ-панель
                        </a>
                        @endgroup
                        @group(1, 2)
                        <a
                            href="{{ url('/editor') }}"
                            class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal"
                        >
                            Добавить материал
                        </a>
                        @endgroup
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent text-sm leading-normal"
                        >
                            Вход
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-4 py-1.5 text-sm leading-normal">
                                Регистрация
                            </a>
                        @endif
                    @endauth
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @auth
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name ?? 'Guest'}}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>

                        </button>
                        @endauth
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Профиль') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Выход') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Главная') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('materials.analytics')" :active="request()->routeIs('materials.analytics')">
                {{ __('Аналитика') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('materials.risks')" :active="request()->routeIs('materials.risks')">
                {{ __('Прогнозы и риски') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('consultations')" :active="request()->routeIs('consultations')">
                {{ __('Консультация') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contacts')" :active="request()->routeIs('contacts')">
                {{ __('Контакты') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('О нас') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        @auth

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name ?? 'Guest'}}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? 'Guest'}}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>

        </div>
        @endauth
    </div>
</nav>
