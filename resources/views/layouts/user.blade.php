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
      </div>
    </nav>
    <ul>
      <li>
        <a href="/products">MENS</a>
      </li>
      <li>
        <a href="/products">LADIES</a>
      </li>
      <li>
        <a href="/products">BRANDS</a>
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
@stop
