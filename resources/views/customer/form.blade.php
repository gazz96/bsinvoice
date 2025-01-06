@extends('layouts.app')



@section('content')

    <div class="container-fluid p-0">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM CUSTOMER</h1>
        </div>
        

        {{ html()->form($customer->id ? 'PUT' : 'POST' , $customer->id ? route('customer.update', $customer) : route('customer.store'))->open() }}


            <div class="row">

                <div class="col-md-4">

                    <div class="card border rounded-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">CUSTOMER NAME</label>
                                {{ html()->text('name')->class('form-control form-control-lg rounded-pill')->value(old('name', $customer->name)) }}
                                @error('name')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">EMAIL</label>
                                {{ html()->email('email')->class('form-control form-control-lg rounded-pill')->value(old('email', $customer->email)) }}
                                @error('email')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">PIC</label>
                                {{ html()->text('pic')->class('form-control form-control-lg rounded-pill')->value(old('pic', $customer->pic)) }}
                            </div>

                            <div class="mb-3">
                                <label for="">PHONE NUMBER</label>
                                {{ html()->text('phone_number')->class('form-control form-control-lg rounded-pill')->value(old('phone_number', $customer->phone_number)) }}
                            </div>

                            <div class="mb-3">
                                <label for="">ADDRESS</label>
                                {{ html()->textarea('address')->class('form-control form-control-lg rounded-4')->value(old('address', $customer->address)) }}
                            </div>
                            
                            <div class="mb-3">
                                <label for="">CURRENCY</label>
                                {{ html()->select('currency_id')->options($currencies->pluck('name', 'id'))->class('form-control form-control-lg rounded-pill')->value(old('currency_id', $customer->currency_id)) }}
                            </div>


                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{route('customer.index')}}" class="btn btn-lg btn-outline-primary rounded-pill me-2">KEMBALI</a>
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
