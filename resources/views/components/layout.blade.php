@props(['title'])

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
@include('partials.navigation')

<nav>
    <x-nav-l href="{{ route('home') }}">Home</x-nav-l>
    <x-nav-l href="{{ route('about-us') }}">About</x-nav-l>
    <x-nav-l href="{{ route('contact') }}">Contact</x-nav-l>
    <x-nav-l href="{{ route('classTypes.index') }}">Specialisations</x-nav-l>

    <!-- Show logged-in user's name and Logout button if authenticated -->
    <div style="float: right;">
        @auth
            <span>Welcome, {{ Auth::user()->name }}</span>
            <x-nav-l href="{{ route('dashboard') }}">Dashboard</x-nav-l>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <x-nav-l href="{{ route('login') }}">Login</x-nav-l>
            <x-nav-l href="{{ route('register') }}">Register</x-nav-l>
        @endauth
    </div>
</nav>

<!-- Content slot -->
{{ $slot }}

</body>
</html>
