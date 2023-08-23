{{-- const NavClass = `flex items-center py-4 capitalize 
text-[2rem] `;
const NavClassInActive = `text-[rgba(0,0,0,.5)] font-semibold 
`;
const NavClassActive = `
text-[rgba(0,0,0,.9)] font-bold`; --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- CSS Style --}}
    <link rel="stylesheet" href='{{asset('/assets/styles/index.css')}}'>
    
    {{-- Froala Editor --}}
    <link href='{{asset('assets/plugins/froala/css/froala_editor.pkgd.min.css')}}' rel="stylesheet" type="text/css" />
    

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])

    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    
</head>
<body>
    <div id="app">
        <main class="">
            <x-nav.dashboard-nav />
            <x-messages />
            <main class="min-h-screen p-8 sm:px-12 w-full">
                {{$slot}}    
            </main>   
        </main>
    </div>
</body>
</html>


