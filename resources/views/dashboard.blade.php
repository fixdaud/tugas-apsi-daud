@extends('layouts.mainlayout')

@section('title', 'Dashboard')
    
@section('content')

<h1>Hallo! {{Auth::user()->username}}</h1>
<div class="row my-5">
        <div class="col-lg-4">
        <div class="card-data room">
            <div class="row">
                <div class="col-6"><i class="bi bi-door-open-fill"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                    <div class='card-desc'>Rooms</div>
                    <div class=>{{$room_count}}</div>

                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="card-data category">
            <div class="row">
                <div class="col-6"><i class="bi bi-list-task"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                    <div class='card-desc'>Categories</div>
                    <div class=>{{$category_count}}</div>

                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="card-data user">
            <div class="row">
                <div class="col-6"><i class="bi bi-people"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                    <div class='card-desc'>Users</div>
                    <div class=>{{$user_count}}</div>

                </div>
            </div>
        </div>
        </div>
</div>

<div class="mt-5">
    <h2>#rent log</h2>

    <table class="table">
        <thead><tr>
            <th> No.</th>
            <th> User</th>
            <th>Room Title</th>
            <th>Rent Date</th>
            <th>End Date</th>
            <th>Actual End Date</th>
            <th>Status</th>
        </tr>
    </thead>
        <tbody><tr><td colspan="7" style="text-align:center">No Data</td></tr></tbody>
    </table>
</div>
@endsection