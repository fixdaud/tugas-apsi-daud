@extends('layouts.mainlayout')

@section('title', 'Add Room')

    
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h1>Add New Book</h1>

<div class="mt-5 w-50">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
        
    @endif
    <form action="room-add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="number" class="form-label">Book Code</label>
            <input type="text" name="room_number" id="number" class="form-control" placeholder="Book Code" value="{{old('room_number')}}">
        </div>
        @csrf
        <div class="mb-3">
            <label for="Title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" {{old('room_number')}}>
        </div>
        @csrf
        <div>
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
               @foreach ($categories as $item)
                   <option value="{{$item->id}}">{{$item->name}}</option>
               @endforeach
            </select>
            </div>

        <div class="mt-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
@endsection
    