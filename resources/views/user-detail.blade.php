@extends('layouts.mainlayout')

@section('title', 'Detail User')
    
@section('content')
    <h1>Detail User</h1>

    <div class="mt-5 d-flex justify-content-end">
        @if ($user->status == 'inactive')
        <a href="/user-approve/{{$user->slug}}" class="btn btn-info">  Approve User</a>
        @endif
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            </div>
            
        @endif
    </div>

    <div class="my-5">
       <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control"  readonly value="{{ $user->username }}">
       </div>
       <div class="mb-3">
        <label for="" class="form-label">Phone</label>
        <input type="text" class="form-control"  readonly value="{{ $user->phone}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Address</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control" style="resize: none">{{$user->address}}</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Status</label>
        <input type="text" class="form-control" readonly value="{{$user->status}}">
    </div>

@endsection