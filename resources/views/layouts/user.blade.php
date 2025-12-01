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
        <input class="search" type="search" placeholder="What are you looking for?" />
        <div>
          <x-icon name="search" class="icon" />
        </div>
      </div>
      <div class="right">
        <a href="/basket">
          <x-icon name="shopping-cart" class="icon" />
        </a>
        <a href="/profile">
          <x-icon name="user" class="icon" />
        </a>
        <button id="theme-toggle" class="theme-toggle">
          <x-icon name="moon" class="icon" id="moon-icon" />
          <x-icon name="sun" class="icon hidden" id="sun-icon" />
        </button>
      </div>
    </nav>
    <ul>
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
    const html = document.documentElement;
    const moonIcon = document.getElementById("moon-icon");
    const sunIcon = document.getElementById("sun-icon");

    // Load saved theme
    if (localStorage.getItem("theme") === "dark") {
      html.classList.add("dark");
      moonIcon.classList.add("hidden");
      sunIcon.classList.remove("hidden");
    }

    document.getElementById("theme-toggle").addEventListener("click", () => {
      const isDark = html.classList.toggle("dark");

      // Toggle icons
      moonIcon.classList.toggle("hidden", isDark);
      sunIcon.classList.toggle("hidden", !isDark);

      // Save preference
      localStorage.setItem("theme", isDark ? "dark" : "light");
    });
  </script>
@stop
