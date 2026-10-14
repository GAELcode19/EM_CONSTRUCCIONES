@php
  $trabajos = [
    ['img' => 'impermeabilizante-azotea.webp', 'w' => 721, 'h' => 1280, 'titulo' => 'Impermeabilizante en azotea',          'tag' => 'Impermeabilizante'],
    ['img' => 'azotea-impermeabilizada.webp',  'w' => 736, 'h' => 553, 'titulo' => 'Azotea impermeabilizada',              'tag' => 'Impermeabilizante'],
    ['img' => 'cancel-bano-aluminio.webp',     'w' => 960, 'h' => 1280, 'titulo' => 'Cancel de baño en aluminio y cristal', 'tag' => 'Aluminio y cristal'],
    ['img' => 'puerta-corrediza-aluminio.webp','w' => 960, 'h' => 1280, 'titulo' => 'Puerta corrediza de aluminio',         'tag' => 'Aluminio'],
    ['img' => 'trabajo-azotea.webp',           'w' => 960, 'h' => 1280, 'titulo' => 'Trabajo en azotea',                    'tag' => 'Mantenimiento'],
  ];
@endphp
<section id="trabajos" class="alt">
  <div class="wrap">
    <div class="car-top">
      <div class="sec-head reveal"><div class="eyebrow">Trabajos</div><h2>Trabajos realizados</h2><p>Desliza para ver más y toca una foto para ampliarla.</p></div>
      <div class="car-ctrl reveal">
        <button class="nav-btn" id="prev" aria-label="Foto anterior"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
        <button class="nav-btn" id="next" aria-label="Foto siguiente"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg></button>
      </div>
    </div>
    <div class="carousel reveal" id="carousel" aria-roledescription="carrusel" aria-label="Trabajos realizados">
      <div class="track" id="track">
@foreach ($trabajos as $i => $t)
        <figure class="slide" role="group" aria-label="{{ $i + 1 }} de {{ count($trabajos) }}">
          <button type="button" aria-label="Ampliar: {{ $t['titulo'] }}">
            <img src="{{ asset('images/em/' . $t['img']) }}" width="{{ $t['w'] }}" height="{{ $t['h'] }}" alt="{{ $t['titulo'] }}" loading="lazy" decoding="async" draggable="false">
            <span class="tag">{{ $t['tag'] }}</span>
            <span class="zoom" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="6"/><path d="M20 20l-4.3-4.3M11 8v6M8 11h6"/></svg></span>
            <span class="cap">{{ $t['titulo'] }}</span>
          </button>
        </figure>
        @endforeach
      </div>
      <div class="car-foot"><div class="bar"><i id="bar"></i></div><span class="count" id="count">1 / {{ count($trabajos) }}</span></div>
    </div>
  </div>
</section>

