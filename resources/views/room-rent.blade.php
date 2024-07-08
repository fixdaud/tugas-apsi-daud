@extends('layouts.mainlayout')

@section('title', 'Book List')

@section('content')

<div class="col-12 col-md-8 offset-md-2 col-lg-6 offet-md-3">
    <h1 class="mb-5">Book Rent Form</h1>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">User</label>
            <select name="user" id="user" class="form-control"></select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Book</label>
            <select name="book" id="book" class="form-control"></select>
            </div>
            <div>
                <button  type="submit" class="btn btn-primary">submit</button>
            </div>
    </form>
</div>
@endsection
