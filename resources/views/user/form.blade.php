@extends('layouts.app')



@section('content')

    <div class="container-fluid p-0">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM USER</h1>
        </div>
        

        {{ html()->form($user->id ? 'PUT' : 'POST' , $user->id ? route('user.update', $user) : route('user.store'))->open() }}


            <div class="row">

                <div class="col-md-4">

                    <div class="card border rounded-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">USERNAME</label>
                                {{ html()->text('name')->class('form-control form-control-lg rounded-pill')->value(old('name', $user->name)) }}
                                @error('name')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            
                             <div class="mb-3">
                                <label for="">FULLNAME</label>
                                {{ html()->text('full_name')->class('form-control form-control-lg rounded-pill')->value(old('full_name', $user->full_name)) }}
                                @error('full_name')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="">EMAIL</label>
                                {{ html()->email('email')->class('form-control form-control-lg rounded-pill')->value(old('email', $user->email)) }}
                                @error('email')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            
                            
                            <div class="mb-3">
                                <label for="">PASSWORD</label>
                                {{ html()->password('password')->class('form-control form-control-lg rounded-pill') }}
                                @error('password')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="">TEAMS</label>
                                {{ html()->multiselect('team_id[]')->options($teams->pluck('name', 'id'))
                                    ->class('form-control form-control-lg rounded-pill')
                                    ->value(old('team_id', $user->teams()->get()->pluck('team_id')))
                                    ->id('i-team_id')}}
                            </div>

                            <div class="mb-3">
                                <label for="">STATUS</label>
                                {{ html()->select('status')->options([
                                    'ON' => 'ON',
                                    'OFF' => 'OFF'
                                ])->class('form-control form-control-lg rounded-pill')->value(old('status', $user->status)) }}
                            </div>


                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{route('user.index')}}" class="btn btn-lg btn-outline-primary rounded-pill me-2">KEMBALI</a>
                        <button type="submit" class="btn btn-lg btn-primary rounded-pill">SIMPAN</button>
                    </div>
                    
                </div>

            </div>

        {{ html()->form()->close() }}

    </div>

@endsection



@section('footer')

    <script>

        $('#i-team_id').select2({

            width: '100%',

            multiple: true,

    

        })

    </script>

   

@endsection
