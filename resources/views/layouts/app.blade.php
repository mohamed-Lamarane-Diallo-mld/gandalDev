<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='icon' type='image/png' href='/favicon.png'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Balises Open Graph pour WhatsApp, Messenger, etc. -->
    <meta property="og:title" content="@yield('title', 'Mon Portfolio')">
    <meta property="og:description" content="Découvrez mes projets incroyables et mon portfolio en ligne !">
    <meta property="og:image" content="{{ asset('images/logo0.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

        <!-- Balises Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Mon Portfolio')">
    <meta name="twitter:description" content="Découvrez mes projets incroyables et mon portfolio en ligne !">
    <meta name="twitter:image" content="{{ asset('images/logo0.png') }}">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        font-weight: 300;
        font-style: normal;
        }
        body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        }
        .navbar {
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .content {
        padding: 40px;
        text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <div class="d-flex align-items-center">
            <img src="/images/logo0.png" alt="logo" width="40" height="40" class="d-inline-block align-text-top me-2">
            <a class="navbar-brand" href="{{ route('home') }}"><strong>PortFolio</strong></a>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">À propos</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('projets') ? 'active' : '' }}" href="{{ route('projets') }}">Projets</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="main py-4 ">
    @yield('content')
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>