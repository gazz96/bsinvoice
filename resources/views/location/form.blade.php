@extends('layouts.app')



@section('content')

    <div class="container p-0" style="max-width: 1280px;">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM LOCATION</h1>
    
        </div>
        

        {{ html()->form('POST' , route('location.store'))->id('formLocation')->open() }}
            
            {{ html()->hidden('id')->value($location->id)->id('locationId') }}

            <div class="row">

                <div class="col-12 col-md-5">
                    <div class="shadow-lg rounded-4">
                        <div class="card rounded-4">

                            <div class="card-body">
                                
                                <div class="mb-3">
                                    <label for="">NAME</label>
                                    {{ html()->text('name')->value($location->name)->class('form-control form-control-lg rounded-pill ') }}
                                    @error('name')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{-- <a href="#modalProductItems" data-bs-toggle="modal" class="btn btn-lg btn-outline-primary rounded-pill me-2 fw-bolder" id="btnPreview">PREVIEW</a> --}}
                        <a href="{{ route('location.index') }}" class="btn btn-lg btn-outline-primary fw-bolder rounded-pill me-2">KEMBALI</a>
                        <button class="btn btn-lg btn-primary rounded-pill fw-bolder">SIMPAN</button>
                    </div>

                </div>

            </div>

        {{ html()->form()->close() }}

    </div>

@endsection


@section('footer')

@endsection
