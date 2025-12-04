@extends('layouts.user')

@push('head')
  @vite('resources/css/watches/index.css')
@endpush

@section('page')
  <section class="hero">
    <h2 class="section-title">
      OUR CATALOG
    </h2>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit
      urna. Pellentesque
      sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis
      imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu..
    </p>
  </section>
  <section class="watch-section">
    <h2 class="section-title">
      {{ $categoryName }} WATCHES
    </h2>
    <div>
      <select name="filter">
        <option>Filter</option>
      </select>
      <select name="sort">
        <option>Sort</option>
      </select>
    </div>
    <div class="watches">
      @foreach ($watches as $watch)
        <a class="watch" href="{{ route('watches.show', compact('watch')) }}">
          <div class="watch-image-container">
            <img class="watch-image" src="{{ asset('storage/' . $watch->image_path) }}" />
          </div>
          <div class="watch-content">
            <p class="watch-brand">{{ strtoupper($watch->brand->name) }}</p>
            <p class="watch-name">{{ $watch->name }}</p>
            <p class="watch-price">£{{ $watch->price }}</p>
          </div>
        </a>
      @endforeach
    </div>
    <div class="pagination">
      @if ($watches->previousPageUrl())
        <a href="{{ $watches->previousPageUrl() }}" class="btn"><strong>Previous</strong></a>
      @else
        <span class="btn disabled">Previous</span>
      @endif

      <span>Page {{ $watches->currentPage() }} of {{ $watches->lastPage() }}</span>

      @if ($watches->nextPageUrl())
        <a href="{{ $watches->nextPageUrl() }}" class="btn"><strong>Next</strong></a>
      @else
        <span class="btn disabled">Next</span>
      @endif
    </div>
  </section>
@stop
