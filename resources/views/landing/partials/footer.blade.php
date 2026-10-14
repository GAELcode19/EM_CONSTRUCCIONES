<footer>
  <div class="wrap">
    <div class="f-grid">
      <div><img src="{{ asset('images/em/logo-em-construcciones.webp') }}" width="550" height="100" alt="EM Construcciones" style="height:34px;width:auto;margin-bottom:16px"><p style="max-width:320px">Estructuras y mantenimiento para casas y negocios en Colima.</p></div>
      <div><h4>Servicios</h4><ul><li><a href="{{ $base }}#servicios">Estructuras</a></li><li><a href="{{ $base }}#servicios">Mantenimiento</a></li><li><a href="{{ $base }}#servicios">Instalaciones</a></li></ul></div>
      <div><h4>Contacto</h4><ul><li><a href="{{ $wa }}" target="_blank" rel="noopener">WhatsApp 312 943 2555</a></li><li><span style="color:var(--muted)">Colima, México</span></li><li><a href="{{ $base }}#cotizar">Pedir cotización</a></li></ul></div>
    </div>
    <div class="f-bottom"><span>© <span id="year">{{ date('Y') }}</span> EM Construcciones · Colima, México</span><span class="f-legal"><a href="{{ route('privacidad') }}">Aviso de privacidad</a><button type="button" class="link-btn" data-cookies="abrir" hidden>Preferencias de cookies</button></span></div>
  </div>
</footer>
