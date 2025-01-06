@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0">GENERAL</h1>
    </div>

    
    <form action="" method="POST" enctype="multipart/form-data"> 

        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">APP NAME</label>
                            {{ html()->text('name')->class('form-control form-control-lg rounded-pill')->value($setting->getByKey('name')) }}
                        </div>

                        <div class="mb-3">
                            <label for="">LOGO</label>
                            {{ html()->file('logo')->class('form-control form-control-lg rounded-pill') }}
                            @if($logo = $setting->getByKey('logo'))
                                <img src="{{asset('storage/' . $logo)}}" class="img-fluid my-3"/>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label>DEFAULT CURRENCY</label>
                            <select class="form-select form-control form-control-lg rounded-pill">
                                <option>CHOOSE</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-lg btn-primary rounded-pill">SAVE SETTINGS</button>
                </div>
                
            </div>
        </div>

    </form>
</div>

@endsection