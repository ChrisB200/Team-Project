@extends('layouts.master')

@section('html-head')
  @yield('head')
@stop

@section('content')
  <header>
    <nav>
      <a href="/" class="left">
        <img class="logo" src="{{ asset('logo.svg') }}" alt="LOGO" />
      </a>
      <div class="middle">
        <form action="{{ route('watches.search') }}" method="GET" class="search-form">
              <input 
                  class="search" 
                  type="search" 
                  name="query" 
                  placeholder="What are you looking for?" 
              />
              <button type="submit" class="search-button">
                  <x-icon name="search" class="icon" />
              </button>
          </form>
      
        
      </div>
      <div class="right">
        <a href="{{ route('basket.index') }}">
          <x-icon name="shopping-cart" class="icon" />
        </a>
        <a href="/profile">
          <x-icon name="user" class="icon" />
        </a>
        <x-theme-toggle />
      </div>
      <x-icon name="menu" class="menu icon" id="menu-icon" />
      <div id="mobile-menu" class="mobile-menu">
        <div class="mobile-top">
          <div class="mobile-logo-container">
            <img class="logo" src="{{ asset('logo.svg') }}" alt="LOGO" />
          </div>
          <x-icon name="menu" class="menu icon mobile" id="close-menu-icon" />
        </div>
        <ul class="mobile-anchors">
          <li>
            <a href="{{ route('home') }}">HOME</a>
          </li>
          <li>
            <a href="{{ route('watches.index') }}">WATCHES</a>
          </li>
          <li>
            <a href="{{ route('about') }}">ABOUT</a>
          </li>
          <li>
            <a href="{{ route('contact.create') }}">CONTACT US</a>
          </li>
          <li>
            <a href="{{ route('basket.index') }}">BASKET</a>
          </li>
          <li>
            <a href="profile">PROFILE</a>
          </li>
        </ul>
        <div class="mobile-accessibility">
          <x-theme-toggle />
          <div class="font-sizes">
            <button class="font-size-btn" data-size="14">A-</button>
            <button class="font-size-btn" data-size="16">R</button>
            <button class="font-size-btn" data-size="18">A+</button>
          </div>
        </div>
      </div>
    </nav>
    <ul class="underlinks">
      <li>
        <a href="{{ route('watches.index') }}">WATCHES</a>
      </li>
      <li>
        <a href="{{ route('about') }}">ABOUT</a>
      </li>
      <li>
        <a href="{{ route('contact.create') }}">CONTACT US</a>
      </li>
    </ul>
  </header>
  <main>
    @yield('page')
  </main>
  <footer>
    <div>
      <a href="/" class="left">
        <img class="logo" src="{{ asset('logo.svg') }}" alt="LOGO" />
      </a>
      <p>Copyright 2025 © for Crown and Dial. All Rights Reserved</p>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="/contact">Contact Us</a></li>
      </ul>
    </div>
  </footer>
  <script>
    const mobileMenu = document.getElementById("mobile-menu");
    const menuIcon = document.getElementById("menu-icon");
    const closeMenuIcon = document.getElementById("close-menu-icon");

    menuIcon.addEventListener("click", () => {
      mobileMenu.classList.add("active");
      document.querySelector("nav").classList.add("menu-open");
    })

    closeMenuIcon.addEventListener("click", () => {
      mobileMenu.classList.remove("active");
      document.querySelector("nav").classList.remove("menu-open");
    })
  </script>
@stop
