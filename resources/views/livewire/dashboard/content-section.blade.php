<div id="contentSection" x-data="{ isExpanded: $wire.isExpanded }" x-on:toggle-sidebar.window="isExpanded = !isExpanded"
    :class="isExpanded ? 'sm:ml-64' : 'sm:ml-16'" x-cloak class="relative h-full w-full transition-all duration-500">
    <main>
        @include('dashboard.templates.navbread')
        @yield('content')
    </main>
</div>
