@php
    use Illuminate\Support\Str;
    $role = session('RoleID') ?? '';
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Page')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Tailwind (Development) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind (Production - Uncomment after build) -->
    <!-- <link href="{{ asset('css/output.css') }}" rel="stylesheet"> -->
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
            @yield('content')
        </div>

        {{-- Footer --}}
        @include('includes.footer')
    </div>

    {{-- JS Scripts --}}
    @if (file_exists(public_path('js/layout.js')))
        <script defer src="{{ asset('js/layout.js') }}"></script>
    @endif

    @hasSection('scriptIndex')
        <script defer src="@yield('scriptIndex')"></script>
    @endif

    @hasSection('scriptPage')
        <script defer src="@yield('scriptPage')"></script>
    @endif
</body>
</html>
