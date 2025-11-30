@extends('layouts.user')

@section('head')
  @vite('resources/css/home.css')
@stop

@section('page')
  <section class="hero">
    <h2 class="section-title">
      CROWN & DIAL
    </h2>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit
      urna. Pellentesque
      sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis
      imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu..
    </p>
    <a href="{{ route('about') }}">
      <button class="accent-button">Find Out More</button>
    </a>
  </section>
  <section class="categories">
    <h2 class="section-title">FEATURED COLLECTION</h2>
    <div class="category-container">
      <a class="category" href="{{ route('watches.category', 'luxury') }}">
        <div class="category-image">
          <img src="{{ asset('images/luxury.png') }}" />
        </div>
        <p><strong>Luxury</strong><br />Watches</p>
      </a>
      <a class="category" href="{{ route('watches.category', 'smart') }}">
        <div class="category-image">
          <img src="{{ asset('images/smart.png') }}" />
        </div>
        <p><strong>Smart</strong><br />Watches</p>
      </a>
      <a class="category" href="{{ route('watches.category', 'sport') }}">
        <div class="category-image">
          <img src="{{ asset('images/sport.png') }}" />
        </div>
        <p><strong>Sports</strong><br />Watches</p>
      </a>
      <a class="category" href="{{ route('watches.category', 'casual') }}">
        <div class="category-image">
          <img src="{{ asset('images/casual.png') }}" />
        </div>
        <p><strong>Casual</strong><br />Watches</p>
      </a>
      <a class="category" href="{{ route('watches.category', 'classic') }}">
        <div class="category-image">
          <img src="{{ asset('images/classic.png') }}" />
        </div>
        <p><strong>Classic</strong><br />Watches</p>
      </a>
    </div>
  </section>
  <section class="reviews">
    <h2 class="section-title">REVIEWS</h2>
    <p>TO BE ADDED</p>
  </section>
@stop
