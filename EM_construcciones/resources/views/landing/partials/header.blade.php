<header id="hdr">
  <div class="wrap">
    <a href="{{ $base }}#inicio" aria-label="EM Construcciones, inicio"><img class="logo" src="{{ asset('images/em/logo-em-construcciones.webp') }}" width="550" height="100" alt="EM Construcciones"></a>
    <nav class="main" id="nav" aria-label="Principal">
      <a href="{{ $base }}#servicios">Servicios</a><a href="{{ $base }}#trabajos">Trabajos</a><a href="{{ $base }}#proceso">Proceso</a><a href="{{ $base }}#cotizar">Cotizar</a><a href="{{ $base }}#faq">Preguntas</a>
    </nav>
    <a class="btn wa sm head-cta" href="{{ $wa }}" target="_blank" rel="noopener">@include('landing.partials.icon-whatsapp')WhatsApp</a>
    <button class="burger" id="burger" aria-label="Abrir menú" aria-expanded="false" aria-controls="mnav"><span></span><span></span></button>
  </div>
  <div class="mnav" id="mnav">
    <a href="{{ $base }}#servicios">Servicios</a><a href="{{ $base }}#trabajos">Trabajos</a><a href="{{ $base }}#proceso">Proceso</a><a href="{{ $base }}#cotizar">Cotizar</a><a href="{{ $base }}#faq">Preguntas</a>
    <a class="btn wa" href="{{ $wa }}" target="_blank" rel="noopener">@include('landing.partials.icon-whatsapp')Escribir por WhatsApp</a>
  </div>
</header>
