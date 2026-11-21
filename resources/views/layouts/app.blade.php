<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Desa Tirta App')</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/bumdes.css') }}">
</head>
<body>
<div class="shell">
  <aside class="side">
    <div class="brand-name">TIRTA MAKMUR</div>
    <small>{{ config('bumdes.roles.'.auth()->user()->role.'.label') }} · {{ auth()->user()->name }}</small>
    <h4>MENU</h4>
    <a class="on" href="{{ route(config('bumdes.roles.'.auth()->user()->role.'.home')) }}">Beranda</a>
    <form method="POST" action="{{ route('logout') }}" style="margin-top:24px">@csrf
      <button class="btn-primary" style="background:rgba(255,255,255,.12)">Keluar</button>
    </form>
  </aside>
  <main class="main">@yield('content')</main>
</div>
</body>
</html>
