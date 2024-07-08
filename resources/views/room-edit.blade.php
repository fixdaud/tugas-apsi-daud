@extends('layouts.mainlayout')

@section('title', 'Edit Room')

    
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h1>Edit Room</h1>

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
    <form action="/room-edit/{{$room->slug}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="text" name="room_number" id="number" class="form-control" placeholder="Book Code" value="{{$room->room_number}}">
        </div>
        @csrf
        <div class="mb-3">
            <label for="Title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" {{$room->title}}>
        </div>
        @csrf
        <div>
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="currentImage" class="form-label" style="display: block">Current Image</label>
            @if ($room->cover!='')
            <img src="{{asset('storage/cover/'.$room->cover)}}" alt="current image" width="300px">
                
            @else
            <img src="{{asset('images/cover-not-found.jpg')}}" alt="current image" width="300px">
                
            @endif
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
               @foreach ($room->categories as $currentCategories)
                   <option value="{{$currentCategories->id}}">{{$currentCategories}}</option>
               @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="currentCategory" class="form-label">current Category</label>
                <ul>
                    @foreach ($room->categories as $category)
                    <li>{{$category->name}}</li>
                        
                    @endforeach
                </ul>
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
    