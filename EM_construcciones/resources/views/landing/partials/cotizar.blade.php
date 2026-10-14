<section id="cotizar">
  <div class="wrap quote">
    <div>
      <div class="sec-head reveal" style="margin-bottom:0"><div class="eyebrow">Cotiza</div><h2>Pide tu cotización en un minuto</h2><p>Llena estos datos y se abrirá WhatsApp con tu mensaje listo para enviar.</p></div>
      <ul class="points">
        <li class="reveal"><div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-6-5.3-6-10a6 6 0 1 1 12 0c0 4.7-6 10-6 10z"/><circle cx="12" cy="11" r="2.2"/></svg></div><div><b>Zona de servicio</b><span>Colima</span></div></li>
        <li class="reveal"><div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20l1.2-5A8.5 8.5 0 1 1 21 11.5z"/></svg></div><div><b>WhatsApp</b><span><a href="{{ $wa }}" target="_blank" rel="noopener">312 943 2555</a></span></div></li>
        <li class="reveal"><div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="12" r="2.5"/><path d="M14 10h4M14 14h3"/></svg></div><div><b>Tip</b><span>Envía fotos del lugar en el chat para cotizar más rápido.</span></div></li>
      </ul>
    </div>
    <form class="qf reveal" id="qf" novalidate>
      <div><label for="f-name">Nombre</label><input id="f-name" name="nombre" autocomplete="name" required placeholder="Tu nombre"></div>
      <div><label for="f-zone">Colonia o municipio</label><input id="f-zone" name="zona" placeholder="Ej. Centro, Colima"></div>
      <div class="full"><label for="f-svc">Servicio</label>
        <select id="f-svc" name="servicio" required>
          <option value="">Selecciona un servicio</option>
          <optgroup label="Estructuras"><option>Aluminio</option><option>Cristal</option><option>Cercos eléctricos</option></optgroup>
          <optgroup label="Mantenimiento"><option>Impermeabilizante</option><option>Pintura</option><option>Plomería</option><option>Lavado de tinacos</option></optgroup>
          <optgroup label="Instalaciones"><option>Aires acondicionados</option><option>Cámaras de seguridad</option><option>Paneles solares</option></optgroup>
          <option>Otro</option>
        </select></div>
      <div class="full"><label for="f-msg">¿Qué necesitas?</label><textarea id="f-msg" name="detalle" placeholder="Ej. Impermeabilizar una azotea de 60 m²"></textarea></div>
      <div class="full"><button class="btn wa" type="submit">@include('landing.partials.icon-whatsapp')Enviar por WhatsApp</button></div>
      <p class="note full">{{ config('landing.responsable') }} usará tus datos para atender tu solicitud y enviarte la cotización por WhatsApp. Al enviar aceptas nuestro <a href="{{ route('privacidad') }}">aviso de privacidad</a>.</p>
    </form>
  </div>
</section>

