@extends('layouts.app')



@section('content')

    <div class="container-fluid p-0">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM VENDOR</h1>
        </div>
        

        {{ html()->form('POST' , route('vendor.store'))->open() }}

            {{ html()->hidden('id')->id('vendorId')->value($vendor->id) }}

            <div class="row">

                <div class="col-md-5">

                    <div class="card border rounded-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">VENDOR NAME</label>
                                {{ html()->text('name')->class('form-control form-control-lg rounded-pill')->value(old('name', $vendor->name)) }}
                                @error('name')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="">FIRST NAME</label>
                                    {{ html()->text('first_name')->class('form-control form-control-lg rounded-pill')->value(old('first_name', $vendor->first_name)) }}
                                    @error('first_name')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="">LAST NAME</label>
                                    {{ html()->text('last_name')->class('form-control form-control-lg rounded-pill')->value(old('last_name', $vendor->last_name)) }}
                                    @error('last_name')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="">EMAIL</label>
                                {{ html()->email('email')->class('form-control form-control-lg rounded-pill')->value(old('email', $vendor->email)) }}
                                @error('email')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">ADDRESS</label>
                                {{ html()->textarea('address')->class('form-control form-control-lg rounded-4')->value(old('address', $vendor->address)) }}
                            </div>

                            <div class="mb-3">
                                <label for="">CITY</label>
                                {{ html()->text('city')->class('form-control form-control-lg rounded-pill')->value(old('city', $vendor->city)) }}
                            </div>

                            <div class="mb-3">
                                <label for="">POSTAL CODE</label>
                                {{ html()->text('postal_code')->class('form-control form-control-lg rounded-pill')->value(old('postal_code', $vendor->postal_code)) }}
                            </div>

                           


                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{route('vendor.index')}}" class="btn btn-lg btn-outline-primary rounded-pill me-2">KEMBALI</a>
                        <button type="submit" class="btn btn-lg btn-primary rounded-pill">SIMPAN</button>
                    </div>
                    
                </div>

            </div>

        {{ html()->form()->close() }}

    </div>

@endsection



@section('footer')

    <script>

        $('#i-warehouse_access_ids').select2({

            width: '100%',

            multiple: true

        })

    </script>

   

@endsection
