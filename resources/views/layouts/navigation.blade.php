<nav x-data="{ open: false }" id="header" class="bg-dark">
    <div class="header grid bg-06dp">
        <!-- Primary Navigation Menu -->
        <div class="grid flex-center justify-between">
            <a href="{{ route('dashboard') }}" class="logo">
                <x-application-logo/>
            </a>

            <div class="nav-main show-medium">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>

            <!-- Settings Dropdown -->
            <div class="show-medium">
                <form method="POST" action="{{ route('logout') }}" x-ref="logoutForm">
                    @csrf

                    <a href="/logout" class="btn-red btn-iconOnly icon-logout icon-right rounded" title="{{ __('Log Out') }}"
                            @click.prevent="$refs.logoutForm.submit()"
                    >
                        {{ __('Log Out') }}
                    </a>
                </form>
                <!-- <x-dropdown>
                    <x-slot name="trigger">
                        <button class="btn small">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        Authentication
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown> -->
            </div>

            <!-- Hamburger -->
            <div class="hide-medium flex-center">
                <button @click.prevent="open = ! open" class="menu-button" :class="open ? 'icon-close' : 'icon-menu'"></button>
            </div>
        </div>

        <div @click.prevent="open = ! open" :class="open ? 'open' : ''" class="mobile-nav-filler"></div>

        <!-- Responsive Navigation Menu -->
        <div :class="open ? 'open' : ''" class="mobile-nav bg-dark">
            <div class="mobile-nav-wrap bg-06dp">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <!-- Responsive Settings Options -->
                <!-- <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div> -->

                <!-- <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link> -->

                <div class="innerWrap"><hr></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-ref="logoutFormMobile">
                    @csrf

                    <a href="/logout" class="nav-mobile-link nav-mobile-link--logout icon-logout icon-right"
                            @click.prevent="$refs.logoutFormMobile.submit()">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
