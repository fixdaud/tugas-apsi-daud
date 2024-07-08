@extends('layouts.mainlayout')

@section('title', 'Room')
    
@section('content')
<h1> Book List</h1>
<div class="mt-5">
    @if (session('status'))
    <div class="alert alert-success">
       {{ session('status') }}
       </div>
        
    @endif
   </div>
   <div class="my-5 d-flex justify-content-end">
    <a href="room-deleted" class="btn btn-secondary me-3">View deleted Data</a>
    <a href="room-add" class="btn btn-primary">Add Data</a>
   </div>

<div class="my-5">
   <table class="table">
       <thead>
           <tr>
               <th>No.</th>
               <th>Book_code</th>
               <th>Title</th>
               <th>Category</th>
               <th>Status</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($rooms as $item)
           <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $item->room_number }}</td>
               <td>{{$item->title}}</td>
               <td>
                @foreach ($item->categories as $category)
                {{$category->name}} <br>
                @endforeach
               </td>
               <td>{{$item->status}}</td>
           <td>
               <a href="/room-edit/{{$item->slug}}">edit</a>
               <a href="/room-delete/{{$item->slug}}">delete</a>
           </td>
           </tr>
           @endforeach
       </tbody>
   </table>
</div>
@endsection