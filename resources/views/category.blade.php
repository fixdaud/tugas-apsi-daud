@extends('layouts.mainlayout')

@section('title', 'Category')

    
@section('content')
<h1> Book Category</h1>

<div class="mt-5 d-flex justify-content-end">
    <a href="category-add" class="btn btn-primary me-3">Add Data</a>
    <a href="category-deleted" class="btn btn-secondary">View Delete Data</a>
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
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
            <td>
                <a href="category-edit/{{$item->slug}}">edit</a>
                <a href="category-delete/{{$item->slug}}">delete</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
    