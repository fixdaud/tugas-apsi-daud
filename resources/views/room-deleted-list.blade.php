@extends('layouts.mainlayout')

@section('title', ' Deleted Room')

    
@section('content')
<h1> Deleted Book List</h1>

<div class="mt-5 d-flex justify-content-end">
    <a href="/rooms" class="btn btn-primary">back</a>
</div>
    <div class="mt-5">
     @if (session('status'))
     <div class="alert alert-success">
        {{ session('status') }}
        </div>
         
     @endif
    </div>

<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Code</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedRooms as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->room_number}}</td>
                <td>{{ $item->title}}</td>
            <td>
                <a href="/room-restore/{{$item->slug}}">Restore</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
    