/* EM Construcciones · Disuasión de inspección
 * Bloquea los atajos y el menú contextual que abren las herramientas de desarrollo
 * y deja un aviso en la consola. Es una barrera visual: la protección real
 * de la página está en el servidor, no en el navegador.
 */
(function () {
  var PROHIBIDO = {
    KeyI: 1, KeyJ: 1, KeyC: 1, KeyK: 1 // Ctrl/Cmd + Shift (+ Alt en Mac) + I, J, C, K
  };

  document.addEventListener('keydown', function (e) {
    var ctrl = e.ctrlKey || e.metaKey;
    var bloquear =
      e.key === 'F12' ||
      (ctrl && e.shiftKey && PROHIBIDO[e.code]) ||
      (e.metaKey && e.altKey && PROHIBIDO[e.code]) ||
      (ctrl && e.code === 'KeyU');
    if (bloquear) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    }
  }, true);

  // Sin menú contextual (clic derecho > Inspeccionar), salvo en los campos del formulario
  document.addEventListener('contextmenu', function (e) {
    var t = e.target;
    if (t && /^(INPUT|TEXTAREA|SELECT)$/.test(t.tagName)) return;
    e.preventDefault();
  }, true);

  // Aviso en la consola
  try {
    console.log('%c¡ALTO!', 'color:#d9480f;font-size:48px;font-weight:800;text-shadow:1px 1px 0 #16202e');
    console.log(
      '%cEsta área es solo para el equipo de EM Construcciones.\n' +
      'No debes estar aquí ni modificar esta página. Está prohibido alterar, copiar o manipular ' +
      'su contenido, y cualquier intento queda bajo tu responsabilidad.',
      'color:#16202e;font-size:16px;font-weight:600;line-height:1.5'
    );
  } catch (err) {}
})();
