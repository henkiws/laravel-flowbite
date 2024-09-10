<!doctype html>
<html x-data="{ darkMode: localStorage.getItem('dark') === 'true'}"
			x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
			x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- <div class="flex gap-8 bg-white dark:bg-gray-900">
        <x-app.sidebar class="min-w-fit flex-grow-0 flex-shrink-0 hidden md:block"/>
        <main class="mt-4 px-4">
            <div class="block sm:absolute top-5 right-8 order-1">
                <x-dark-mode-toggle size="4" />
            </div>
            {{ $slot }}
            <x-app.footer />
        </main>
    </div> --}}

    <div class="antialiased bg-gray-50 dark:bg-gray-900 h-full">
        <x-app.header/>
    
        <!-- Sidebar -->
        <x-app.sidebar/>
    
        <main class="p-4 md:ml-64 h-full pt-20">
            {{ $slot }}
            <x-app.footer />
        </main>
      </div>
</body>

</html>