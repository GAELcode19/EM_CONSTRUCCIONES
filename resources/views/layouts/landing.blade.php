<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>@yield('title', 'EM Construcciones | Estructuras y mantenimiento en Colima')</title>
<meta name="description" content="EM Construcciones en Colima: aluminio, cristal, plomería, pintura, impermeabilizante, lavado de tinacos, paneles solares, aires acondicionados, cámaras y cercos eléctricos. Cotiza por WhatsApp.">
<meta name="theme-color" content="#ffffff">
<meta property="og:type" content="website">
<meta property="og:title" content="EM Construcciones | Estructuras y mantenimiento en Colima">
<meta property="og:description" content="10 servicios para tu casa o negocio en Colima. Cotiza directo por WhatsApp.">
<meta property="og:locale" content="es_MX">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='14' fill='%2316202e'/%3E%3Ctext x='32' y='42' font-family='Arial' font-weight='700' font-size='26' fill='white' text-anchor='middle'%3EEM%3C/text%3E%3C/svg%3E">
<link rel="preload" href="{{ asset('fonts/plus-jakarta-sans-latin.woff2') }}" as="font" type="font/woff2" crossorigin>
@stack('preload')
<script type="application/ld+json">
{"@@context":"https://schema.org","@type":"HomeAndConstructionBusiness","name":"EM Construcciones","telephone":"{{ $telefono }}","areaServed":"Colima, México","address":{"@type":"PostalAddress","addressLocality":"Colima","addressRegion":"Colima","addressCountry":"MX"},"description":"Estructuras y mantenimiento: aluminio, cristal, plomería, pintura, impermeabilizante, lavado de tinacos, paneles solares, aires acondicionados, cámaras de seguridad y cercos eléctricos."}
</script>
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/em/hero-trabajadores.webp') }}">
<link rel="canonical" href="{{ url()->current() }}">
@hasSection('noindex')<meta name="robots" content="noindex, follow">@endif
<script>document.documentElement.classList.add('js')</script>
<link rel="stylesheet" href="{{ asset('css/landing.css') }}?v={{ filemtime(public_path('css/landing.css')) }}">
@stack('styles')
</head>
@php($base = request()->routeIs('home') ? '' : route('home'))
<body data-wa="{{ $wa }}" data-pixel="{{ config('landing.meta_pixel_id') }}">
<a class="skip" href="@yield('skip', '#servicios')">Saltar al contenido</a>
<div id="progress"></div>

@include('landing.partials.header')

<main>
@yield('content')
</main>

@include('landing.partials.footer')
@include('landing.partials.flotantes')
@include('landing.partials.cookies')

<script src="{{ asset('js/cookies.js') }}?v={{ filemtime(public_path('js/cookies.js')) }}" defer></script>
<script src="{{ asset('js/landing.js') }}?v={{ filemtime(public_path('js/landing.js')) }}" defer></script>
<script src="{{ asset('js/proteccion.js') }}?v={{ filemtime(public_path('js/proteccion.js')) }}" defer></script>
@stack('scripts')
</body>
</html>
