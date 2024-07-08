@extends('layouts.mainlayout')

@section('title', ' Delete Room')
    
@section('content')
<h2>Are You Sure to Delete Room {{$room->name}}</h2>
<div class="mt-5">
    <a href="/room-destroy/{{$room->slug}}" class="btn btn-danger me-5">Sure</a>
    <a href="/categories" class="btn btn-primary">Cancel</a>
</div>
@endsection
    