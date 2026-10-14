@extends('layouts.landing')

@push('preload')
<link rel="preload" as="image" href="{{ asset('images/em/hero-trabajadores.webp') }}" type="image/webp" fetchpriority="high">
@endpush

@section('content')
  @include('landing.partials.hero')
  @include('landing.partials.marquee')
  @include('landing.partials.servicios')
  @include('landing.partials.trabajos')
  @include('landing.partials.por-que')
  @include('landing.partials.proceso')
  @include('landing.partials.cotizar')
  @include('landing.partials.faq')
  @include('landing.partials.contacto')
@endsection
