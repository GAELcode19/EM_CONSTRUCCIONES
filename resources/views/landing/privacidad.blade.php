@extends('layouts.landing')

@section('title', 'Aviso de privacidad | EM Construcciones')
@section('skip', '#contenido')

@php
  $responsable = config('landing.responsable');
  $domicilio   = config('landing.domicilio');
  $correo      = config('landing.correo_privacidad');
  $correoValido = filter_var($correo, FILTER_VALIDATE_EMAIL);
  $telefono    = config('landing.telefono');
  $pixel       = config('landing.meta_pixel_id');
  $sesion      = config('session.cookie');
@endphp

@section('content')
<section class="legal" id="contenido">
  <div class="wrap legal-wrap">
    <a class="legal-back" href="{{ route('home') }}">← Volver al inicio</a>
    <div class="eyebrow">Legal</div>
    <h1>Aviso de privacidad integral</h1>
    <p class="legal-meta">Última actualización: {{ config('landing.aviso_actualizado') }}</p>

    <p>En <b>{{ $responsable }}</b> nos tomamos en serio la protección de tus datos personales. Este aviso explica qué datos recabamos, para qué los usamos, con quién los compartimos y cómo puedes ejercer tus derechos, conforme a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP) y demás normativa aplicable en México.</p>

    <nav class="legal-toc" aria-label="Contenido del aviso">
      <b>Contenido</b>
      <ol>
        <li><a href="#responsable">Responsable</a></li>
        <li><a href="#datos">Datos que recabamos</a></li>
        <li><a href="#medios">Cómo los obtenemos</a></li>
        <li><a href="#finalidades">Para qué los usamos</a></li>
        <li><a href="#secundarias">Cómo negarte a finalidades secundarias</a></li>
        <li><a href="#compartir">Con quién los compartimos</a></li>
        <li><a href="#cookies">Cookies y tecnologías de rastreo</a></li>
        <li><a href="#arco">Derechos ARCO</a></li>
        <li><a href="#revocar">Revocar tu consentimiento y limitar el uso</a></li>
        <li><a href="#conservacion">Conservación y seguridad</a></li>
        <li><a href="#menores">Menores de edad</a></li>
        <li><a href="#cambios">Cambios a este aviso</a></li>
        <li><a href="#autoridad">Autoridad</a></li>
      </ol>
    </nav>

    <h2 id="responsable">1. Responsable de tus datos</h2>
    <p><b>{{ $responsable }}</b>, con domicilio en {{ $domicilio }}, es responsable del tratamiento de tus datos personales.</p>
    <p>Para cualquier tema relacionado con este aviso puedes escribirnos a
      @if ($correoValido)
        <a href="mailto:{{ $correo }}">{{ $correo }}</a>
      @else
        {{ $correo }}
      @endif
      o por WhatsApp al <a href="{{ $wa }}" target="_blank" rel="noopener">{{ $telefono }}</a>.</p>

    <h2 id="datos">2. Datos personales que recabamos</h2>
    <p>Recabamos únicamente los datos necesarios para atender tu solicitud:</p>
    <ul>
      <li><b>Identificación y contacto:</b> nombre, número de teléfono o WhatsApp, y correo electrónico si nos lo compartes.</li>
      <li><b>Ubicación del servicio:</b> colonia o municipio y, cuando se agenda una visita o trabajo, el domicilio donde se realizará.</li>
      <li><b>Información de tu solicitud:</b> el servicio que te interesa, la descripción de lo que necesitas y las fotografías o videos del lugar que decidas enviarnos.</li>
      <li><b>Datos para facturación</b> (solo si solicitas factura): nombre o razón social, RFC, régimen fiscal, código postal fiscal y correo electrónico.</li>
      <li><b>Datos de navegación:</b> información técnica que se genera al visitar el sitio (tipo de dispositivo y navegador, páginas visitadas y dirección IP), a través de cookies y tecnologías similares descritas en la sección 7.</li>
    </ul>
    <p><b>No solicitamos datos personales sensibles</b> (por ejemplo, de salud, religión, origen étnico u opiniones políticas) ni datos financieros como números de tarjeta. Te pedimos no enviarlos por ninguno de nuestros medios de contacto.</p>

    <h2 id="medios">3. Cómo obtenemos tus datos</h2>
    <ul>
      <li><b>Formulario de cotización de este sitio:</b> el formulario no guarda tu información en nuestro servidor. Al presionar “Enviar por WhatsApp” se abre la aplicación de WhatsApp con un mensaje que contiene los datos que escribiste, y tú decides si lo envías.</li>
      <li><b>WhatsApp y llamadas:</b> cuando nos escribes o llamas directamente.</li>
      <li><b>Anuncios en Facebook e Instagram (Meta Ads):</b> cuando respondes a uno de nuestros anuncios, nos envías un mensaje desde ellos o llenas un formulario de contacto dentro de Facebook o Instagram. En ese caso, Meta nos entrega los datos que tú escribes en el formulario (por ejemplo, nombre, teléfono y lo que necesitas).</li>
      <li><b>De forma presencial:</b> durante visitas para cotizar o al realizar un trabajo.</li>
      <li><b>De forma automática:</b> mediante cookies y tecnologías de rastreo al navegar en este sitio (sección 7).</li>
    </ul>

    <h2 id="finalidades">4. Para qué usamos tus datos</h2>
    <h3>Finalidades primarias (necesarias para darte el servicio)</h3>
    <ul>
      <li>Atender tu solicitud de información y responder tus mensajes.</li>
      <li>Elaborar y enviarte cotizaciones.</li>
      <li>Agendar visitas técnicas y la realización de los trabajos.</li>
      <li>Realizar, dar seguimiento y garantizar los trabajos contratados.</li>
      <li>Emitir facturas y comprobantes cuando los solicites.</li>
      <li>Cumplir obligaciones legales y atender requerimientos de autoridades.</li>
    </ul>
    <h3>Finalidades secundarias (no son necesarias para darte el servicio)</h3>
    <ul>
      <li>Enviarte promociones, descuentos y novedades de nuestros servicios por WhatsApp u otros medios.</li>
      <li>Medir y mejorar el desempeño de nuestros anuncios en Facebook e Instagram y mostrarte publicidad relacionada con nuestros servicios.</li>
      <li>Pedirte tu opinión sobre el servicio recibido y publicar fotografías de los trabajos realizados, <b>sin datos que te identifiquen a ti ni el domicilio</b>.</li>
    </ul>

    <h2 id="secundarias">5. Cómo negarte a las finalidades secundarias</h2>
    <p>Puedes negarte en cualquier momento a que usemos tus datos para las finalidades secundarias. Basta con enviarnos un mensaje por WhatsApp o
      @if ($correoValido)
        a <a href="mailto:{{ $correo }}">{{ $correo }}</a>
      @else
        al correo indicado en la sección 1
      @endif
      indicando “No deseo recibir publicidad” o la finalidad a la que te niegas. También puedes responder “BAJA” a cualquier mensaje promocional. Negarte <b>no afecta</b> el servicio que nos solicitaste.</p>
    <p>Para la publicidad dentro de Facebook e Instagram puedes, además, rechazar las cookies de publicidad en este sitio (sección 7) y ajustar tus preferencias de anuncios desde tu cuenta de Meta.</p>

    <h2 id="compartir">6. Con quién compartimos tus datos</h2>
    <p><b>No vendemos ni rentamos tus datos personales.</b> Para operar, nos apoyamos en proveedores que tratan datos por cuenta nuestra o como plataformas de comunicación:</p>
    <div class="legal-table">
      <table>
        <thead><tr><th>Destinatario</th><th>Para qué</th></tr></thead>
        <tbody>
          <tr><td>Meta Platforms (WhatsApp, Facebook e Instagram)</td><td>Comunicarnos contigo por WhatsApp, recibir los datos de los formularios de nuestros anuncios y, si aceptas las cookies de publicidad, medir el resultado de los anuncios.</td></tr>
          <tr><td>Proveedor de alojamiento web (hosting)</td><td>Mantener este sitio en funcionamiento.</td></tr>
          <tr><td>Google (Google Fonts)</td><td>Cargar la tipografía del sitio; Google recibe la dirección IP de tu dispositivo al descargarla.</td></tr>
          <tr><td>Servicio de Administración Tributaria (SAT) y proveedor de facturación</td><td>Emitir facturas cuando las solicites.</td></tr>
          <tr><td>Autoridades competentes</td><td>Cuando la ley lo exija o exista un requerimiento fundado y motivado.</td></tr>
        </tbody>
      </table>
    </div>
    <p>Algunos de estos proveedores pueden almacenar información fuera de México. Las transferencias que hacemos son las necesarias para darte el servicio o las que permite la ley sin requerir tu consentimiento. Si en el futuro necesitáramos hacer una transferencia que sí lo requiera, te lo pediremos previamente.</p>

    <h2 id="cookies">7. Cookies y tecnologías de rastreo</h2>
    <p>Las cookies son pequeños archivos que se guardan en tu navegador. En este sitio usamos:</p>
    <div class="legal-table">
      <table>
        <thead><tr><th>Nombre</th><th>Tipo</th><th>Para qué sirve</th><th>Duración</th></tr></thead>
        <tbody>
          <tr><td><code>{{ $sesion }}</code></td><td>Técnica (necesaria)</td><td>Mantener la sesión de navegación del sitio.</td><td>Hasta 2 horas sin actividad</td></tr>
          <tr><td><code>XSRF-TOKEN</code></td><td>Técnica (necesaria)</td><td>Proteger el sitio contra solicitudes falsificadas.</td><td>Hasta 2 horas</td></tr>
          <tr><td><code>em_cookie_consent</code></td><td>Preferencia (almacenamiento local)</td><td>Recordar si aceptaste o rechazaste las cookies de publicidad.</td><td>12 meses</td></tr>
          <tr><td><code>_fbp</code>, <code>_fbc</code>, <code>fr</code></td><td>Publicidad (Pixel de Meta)</td><td>Medir las visitas y contactos que llegan desde nuestros anuncios en Facebook e Instagram y mostrarte anuncios relacionados. <b>Solo se activan si las aceptas.</b></td><td>Hasta 90 días</td></tr>
        </tbody>
      </table>
    </div>
    <p>Con el Pixel de Meta se pueden obtener datos como la página visitada, la fecha y hora, el tipo de dispositivo y navegador, la dirección IP y acciones como presionar el botón de WhatsApp o enviar el formulario. <b>No enviamos a Meta tu nombre ni el contenido de tu mensaje.</b></p>
    <p><b>Cómo desactivarlas:</b>
      @if ($pixel)
        puedes cambiar tu decisión en cualquier momento desde <button type="button" class="link-btn" data-cookies="abrir" hidden>Preferencias de cookies</button> (también en el pie de página).
      @endif
      Además, puedes bloquear o borrar las cookies desde la configuración de tu navegador (Chrome, Safari, Firefox o Edge, en la sección de privacidad) y administrar los anuncios que ves desde la configuración de anuncios de tu cuenta de Facebook o Instagram. Si bloqueas las cookies técnicas, algunas funciones del sitio podrían no funcionar correctamente.</p>

    <h2 id="arco">8. Derechos ARCO</h2>
    <p>Tienes derecho a <b>Acceder</b> a tus datos, <b>Rectificarlos</b> si son inexactos o incompletos, <b>Cancelarlos</b> cuando consideres que no se requieren para las finalidades señaladas, y <b>Oponerte</b> a su uso para fines específicos.</p>
    <p>Para ejercerlos envía tu solicitud
      @if ($correoValido)
        a <a href="mailto:{{ $correo }}">{{ $correo }}</a>
      @else
        al correo indicado en la sección 1
      @endif
      con lo siguiente:</p>
    <ul>
      <li>Tu nombre y un medio para comunicarte la respuesta.</li>
      <li>Una copia de tu identificación oficial o, en su caso, la de tu representante legal y el documento que acredite la representación.</li>
      <li>La descripción clara de los datos y del derecho que deseas ejercer.</li>
      <li>Cualquier documento que facilite la localización de tus datos; en caso de rectificación, el dato correcto y el documento que lo respalde.</li>
    </ul>
    <p>Te responderemos en un plazo máximo de 20 días hábiles contados desde que recibamos tu solicitud completa y, si resulta procedente, la haremos efectiva dentro de los 15 días hábiles siguientes. Estos plazos podrán ampliarse una sola vez por un periodo igual cuando las circunstancias lo justifiquen, en los términos que establece la ley.</p>

    <h2 id="revocar">9. Revocar tu consentimiento y limitar el uso de tus datos</h2>
    <p>Puedes revocar el consentimiento que nos hayas dado siguiendo el mismo procedimiento de la sección 8. Ten en cuenta que no siempre podremos atender la revocación de inmediato cuando debamos conservar algún dato por obligación legal, y que revocarlo para finalidades primarias puede impedir que terminemos el servicio contratado.</p>
    <p>Para limitar el uso de tus datos con fines publicitarios también puedes inscribirte en el <a href="https://repep.profeco.gob.mx" target="_blank" rel="noopener">Registro Público para Evitar Publicidad (REPEP) de Profeco</a>.</p>

    <h2 id="conservacion">10. Conservación y seguridad</h2>
    <p>Conservamos tus datos solo durante el tiempo necesario para cumplir las finalidades de este aviso y nuestras obligaciones legales (por ejemplo, fiscales). Las conversaciones de cotizaciones que no se concretan se eliminan periódicamente de nuestros dispositivos.</p>
    <p>Aplicamos medidas de seguridad administrativas, técnicas y físicas razonables para proteger tus datos contra daño, pérdida, alteración, destrucción o uso, acceso o tratamiento no autorizado. Si ocurriera una vulneración que afecte de forma significativa tus derechos, te lo informaremos sin demora.</p>

    <h2 id="menores">11. Menores de edad</h2>
    <p>Nuestros servicios están dirigidos a personas mayores de edad. No recabamos de forma intencional datos de menores; si eres menor de 18 años, pide a tu madre, padre o tutor que se comunique con nosotros.</p>

    <h2 id="cambios">12. Cambios a este aviso</h2>
    <p>Este aviso puede actualizarse por cambios legales, en nuestros servicios o en la forma en que tratamos los datos. Cualquier cambio se publicará en esta misma página, indicando la fecha de la última actualización al inicio.</p>

    <h2 id="autoridad">13. Autoridad</h2>
    <p>Si consideras que tu derecho a la protección de datos personales ha sido vulnerado, puedes acudir ante la autoridad competente en la materia, actualmente la <b>Secretaría Anticorrupción y Buen Gobierno</b> del Gobierno de México.</p>

    <div class="legal-cta">
      <p>¿Tienes dudas sobre este aviso?</p>
      <a class="btn wa" href="{{ $wa }}?text={{ rawurlencode('Hola, tengo una duda sobre el aviso de privacidad.') }}" target="_blank" rel="noopener">@include('landing.partials.icon-whatsapp')Escríbenos por WhatsApp</a>
    </div>
  </div>
</section>
@endsection
