<a class="wa-float" id="waf" href="{{ $wa }}?text=Hola%2C%20quiero%20una%20cotizaci%C3%B3n" target="_blank" rel="noopener" aria-label="Escribir por WhatsApp">@include('landing.partials.icon-whatsapp')</a>
<button class="to-top" id="toTop" aria-label="Volver arriba"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg></button>

<div class="lb" id="lb" role="dialog" aria-modal="true" aria-label="Foto ampliada" hidden>
  <button class="lb-close" id="lbClose" aria-label="Cerrar">×</button>
  <button class="lb-prev" id="lbPrev" aria-label="Anterior">‹</button>
  <figure><img id="lbImg" alt=""><figcaption id="lbCap"></figcaption></figure>
  <button class="lb-next" id="lbNext" aria-label="Siguiente">›</button>
</div>

