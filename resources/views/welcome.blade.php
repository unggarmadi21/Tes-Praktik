@extends('layout.sidebar')
@section('title','Dashboard Registration')
@section('content')
{{ $errors }}
<form method="POST" action="{{ route('registration.create') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input name="name" class="form-control" id="name" aria-describedby="nama">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Address</label>
        <input name="alamat" class="form-control" id="alamat" aria-describedby="addres">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
@endsection
