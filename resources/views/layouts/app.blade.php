@props(['title' => 'Home'])

@php
    use Illuminate\Support\Str;
    $role = session('RoleID') ?? '';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#01002e] to-black text-white">

    {{-- Sidebar --}}
    @include('includes.sidebar')

    {{-- Mobile Menu --}}
    @include('includes.mobilemenu')

    <div id="mainBody" class="md:ml-[75px] mt-16 md:mt-0 min-h-[calc(100vh)]">
        {{-- Top Navigation Bar --}}
        @include('includes.topNavBar')

        {{-- Page Content --}}
        <div class="md:pt-14 px-4">
            {{ $slot }}
        </div>

        {{-- Footer --}}
        @include('includes.footer')
    </div>

    @vite(['resources/js/layout.js'])
    @vite(['resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
