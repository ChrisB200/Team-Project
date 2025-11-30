@extends("master")

@section("content")
<form class="credential-form" action="{{ route('admin.suppliers.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="credential-title">Create a new supplier</h1>
    <div class="credential-row">
        <label>Name</label>
        <input id="name" type="text" name="name" required autofocus/>
    </div>
    <div class="credential-row">
        <label>Phone Number</label>
        <input id="contact" type="text" name="contact" required/>
    </div>
    <button type="submit">Create</button>
</form>
@stop


