@extends('layouts.app')

@section('content')


@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0 fw-bold">PACKAGES</h1>

            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('package.create') }}">
                    <span data-lucide="plus"></span>
                    <span class="fw-bold">CREATE</span>
                </a>
            </div>
        </div>

        <form action="">
            <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="s" class="form-control form-control-lg rounded-pill"
                        value="{{ request('s') }}" placeholder="Input your keywords">
                </div>
            </div>
        </form>

        

    </div>
@endsection



@endsection