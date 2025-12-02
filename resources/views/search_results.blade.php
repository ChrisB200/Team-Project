
@section('head')

<h2>Search Results for "{{ $query }}"</h2>

@if($watches->isEmpty())
    <p>No watches found.</p>
@else
    @foreach($watches as $watch)
        <div>
            <h3>{{ $watch->name }}</h3>
            <p>{{ $watch->description }}</p>
            <p>£{{ $watch->price }}</p>
        </div>
    @endforeach
@endif