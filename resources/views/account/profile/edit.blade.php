@extends('layouts.settings')

@push('head')
  @vite('resources/css/account/profile/edit.css')
@endpush

@section('page')
  <form class="edit-form" method="post" action="{{ route('account.profile.update') }}">
    @csrf
    @method('patch')
    <div>
      <h2 class="credential-title">Update Profile</h2>
      <br />
      <hr />
    </div>
    <div class="credential-rows">
      <div class="credential-row">
        <label for="name">Name</label>
        <input name="name" type="name" value="{{ $user->name }}" />
      </div>
      <div class="credential-row">
        <label for="email">Email</label>
        <input name="email" type="email" value="{{ $user->email }}" />
      </div>
      <button class="accent-button">Submit</button>
    </div>
  </form>
@stop
