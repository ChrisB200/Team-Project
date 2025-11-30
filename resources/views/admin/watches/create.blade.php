@extends('layouts.admin')

@section('page')
  <h1>Add New Watch</h1>
  <hr><br>

  {{-- Success Message --}}
  @if (session('success'))
    <div style="padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px;">
      {{ session('success') }}
    </div>
  @endif

  {{-- Errors --}}
  @if ($errors->any())
    <div style="padding: 10px; background: #f8d7da; color: #721c24; margin-bottom: 15px;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>- {{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.watches.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Brand --}}
    <label>Brand:</label><br>
    <select name="brand_id" required>
      <option value="">-- Select Brand --</option>
      @foreach ($brands as $brand)
        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
      @endforeach
    </select>
    <br><br>

    {{-- Category --}}
    <label>Category:</label><br>
    <select name="category_id" required>
      <option value="">-- Select Category --</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    <br><br>

    {{-- Category --}}
    <label>Supplier</label><br>
    <select name="supplier_id" required>
      <option value="">-- Select Supplier--</option>
      @foreach ($suppliers as $supplier)
        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
      @endforeach
    </select>
    <br><br>

    {{-- Model --}}
    <label>Name</label><br>
    <input type="text" name="name" placeholder="e.g. Submariner" required>
    <br><br>

    {{-- Price --}}
    <label>Price</label><br>
    <input type="number" name="price" step="0.01" required>
    <br><br>

    {{-- Size --}}
    <label>Size</label><br>
    <input type="number" name="size" step="1" required>
    <br><br>

    {{-- Description --}}
    <label>Description</label><br>
    <textarea name="description" rows="4" cols="50"></textarea>
    <br><br>

    {{-- Image --}}
    <label>Product Image</label><br>
    <input type="file" name="image">
    <br><br>

    <button type="submit">Create Watch</button>
  </form>

@stop
