@extends('layouts.user')

@push('head')
  @vite('resources/css/about.css')
@endpush

@section('page')
  <section class="hero">
    <h2 class="section-title">
      ABOUT US
    </h2>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit
      urna. Pellentesque
      sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis
      imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu..
    </p>
  </section>
@stop
