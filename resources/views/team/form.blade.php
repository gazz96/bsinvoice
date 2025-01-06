@extends('layouts.app')



@section('content')

    <div class="container-fluid p-0">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM TEAM</h1>
        </div>
        

        {{ html()->form('POST', route('team.store'))->open() }}

            {{ html()->hidden('id')->value($team->id)->id('teamIdInput') }}

            <div class="row">

                <div class="col-md-4">

                    <div class="card border rounded-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">NAME</label>
                                {{ html()->text('name')->class('form-control form-control-lg rounded-pill')->value(old('name', $team->name)) }}
                                @error('name')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">STATUS</label>
                                {{ html()->select('status', [
                                    'ON' => 'ON',
                                    'OFF' => 'OFF'
                                ])
                                    ->class('form-control form-control-lg rounded-pill')
                                    ->value(old('status', $team->status)) }}
                                @error('status')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{route('team.index')}}" class="btn btn-lg btn-outline-primary rounded-pill me-2">KEMBALI</a>
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
