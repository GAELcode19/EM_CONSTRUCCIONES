/* EM Construcciones · Consentimiento de cookies y Pixel de Meta
 * El Pixel de Meta SOLO se carga si la persona acepta las cookies de publicidad.
 * Si no hay META_PIXEL_ID configurado, no se muestra el banner ni se carga nada.
 */
(function () {
  var PIXEL = document.body.getAttribute('data-pixel') || '';
  var KEY = 'em_cookie_consent';
  var MAX_AGE = 365 * 24 * 60 * 60 * 1000; // se vuelve a preguntar después de 12 meses
  var banner = document.getElementById('cookieBanner');

  function leer() {
    try {
      var c = JSON.parse(localStorage.getItem(KEY) || 'null');
      if (c && Date.now() - c.t < MAX_AGE) return c;
    } catch (e) {}
    return null;
  }
  function guardar(ads) {
    try { localStorage.setItem(KEY, JSON.stringify({ v: 1, ads: !!ads, t: Date.now() })); } catch (e) {}
  }

  var cargado = false;
  function cargarPixel() {
    if (cargado || !PIXEL) return;
    cargado = true;
    /* Código base oficial del Pixel de Meta */
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return; n = f.fbq = function () { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments) };
      if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = [];
      t = b.createElement(e); t.async = !0; t.src = v; s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s)
    }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    window.fbq('init', PIXEL);
    window.fbq('track', 'PageView');
  }

  function borrarCookiesMeta() {
    ['_fbp', '_fbc', 'fr'].forEach(function (n) {
      document.cookie = n + '=; Max-Age=0; path=/';
      document.cookie = n + '=; Max-Age=0; path=/; domain=' + location.hostname.replace(/^www\./, '.');
    });
  }

  // Eventos para medir anuncios (solo se envían si el Pixel está activo)
  window.emTrack = function (evento, datos) {
    if (cargado && window.fbq) window.fbq('track', evento, datos || {});
  };
  document.addEventListener('click', function (e) {
    var a = e.target.closest && e.target.closest('a[href*="wa.me"]');
    if (a) window.emTrack('Contact');
  });

  function mostrar() { if (banner) { banner.hidden = false; requestAnimationFrame(function () { banner.classList.add('show'); }); } }
  function ocultar() { if (banner) { banner.classList.remove('show'); setTimeout(function () { banner.hidden = true; }, 250); } }

  if (!PIXEL) return; // sin Pixel configurado no hay cookies de publicidad: nada que preguntar

  var c = leer();
  if (c && c.ads) cargarPixel();
  if (!c) mostrar();

  document.querySelectorAll('[data-cookies="aceptar"]').forEach(function (b) {
    b.addEventListener('click', function () { guardar(true); cargarPixel(); ocultar(); });
  });
  document.querySelectorAll('[data-cookies="rechazar"]').forEach(function (b) {
    b.addEventListener('click', function () {
      guardar(false);
      if (cargado && window.fbq) { window.fbq('consent', 'revoke'); borrarCookiesMeta(); location.reload(); return; }
      ocultar();
    });
  });
  document.querySelectorAll('[data-cookies="abrir"]').forEach(function (b) {
    b.hidden = false;
    b.addEventListener('click', function (e) { e.preventDefault(); mostrar(); });
  });
})();
