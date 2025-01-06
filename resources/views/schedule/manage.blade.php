@extends('layouts.app')


@section('content')

<div class="container-fluid p-0">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0">TEAM TASK</h1>
    </div>

    <div class="d-flex me-3">

        @foreach ($teams as $team)
        
        <div class="card bg-light me-3" style="width: 272px;">

            <div class="card-header mb-0 bg-light">
                <h3 class="mb-0">{{$team->name}}</h3>
            </div>

            <div class="card-body">

            </div>

            <div class="card-footer bg-light">
                <a href="" class="btn btn-secondary">Add Task</a>
            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection