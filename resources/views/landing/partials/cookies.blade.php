@if (config('landing.meta_pixel_id'))
<div class="cookie-banner" id="cookieBanner" role="dialog" aria-live="polite" aria-label="Uso de cookies" hidden>
  <div class="cookie-text">
    <b>Usamos cookies</b>
    <p>Usamos cookies técnicas para que el sitio funcione y, solo si aceptas, cookies de publicidad de Meta (Facebook e Instagram) para medir y mejorar nuestros anuncios. Puedes cambiar tu decisión cuando quieras. <a href="{{ route('privacidad') }}#cookies">Más información</a></p>
  </div>
  <div class="cookie-actions">
    <button type="button" class="btn ghost sm" data-cookies="rechazar">Rechazar</button>
    <button type="button" class="btn sm" data-cookies="aceptar">Aceptar</button>
  </div>
</div>
@endif
