@extends('layouts.master')

@section('content')
  <header>
    <ul>
      <li>
        <a href="{{ route('admin.suppliers.create') }}">
          Create Supplier
        </a>
      </li>
      <li>
        <a href="{{ route('admin.brands.create') }}">
          Create Brand
        </a>
      </li>
      <li>
        <a href="{{ route('admin.watches.create') }}">
          Create Watch
        </a>
      </li>
    </ul>
  </header>
  <main>
    @yield('page')
  </main>
@stop
