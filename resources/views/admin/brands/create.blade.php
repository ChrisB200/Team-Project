@extends('layouts.admin')

@section('page')
  <h1>Add New Brand</h1>
  <hr><br>
  <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Model --}}
    <label>Name</label><br>
    <input type="text" name="name" placeholder="e.g. Rolex" required>
    <br><br>

    <button type="submit">Create Brand</button>
  </form>
@endsection
