@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>
    <div>{ $user->email }</div>
</div>
@endsection