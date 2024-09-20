@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
         <div class="row align-items-center mb-3">
            <div class="col-md-6">
                <h1 class="h3 mb-0">Form Menu</h1>
            </div>
        </div>
    </div>
    @if($menu->id)
        {{ html()->form('PUT' , route('menu.update', $menu->id))->id('formMenu')->open() }}
    @else 
        {{ html()->form('POST' , route('menu.store'))->id('formMenu')->open() }}
    @endif
    <div class="row">
        <div class="col-md-5">

            @if (session('status'))
                <div class="alert alert-{{ session('status') }} alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            
            <div class="card">
                <div class="card-body">
                    
                    
                    
                    <div class="mb-3">
                        <label for="first_name">Nama</label>
                        {{ html()->text('name')->value($menu->name)->class('form-control form-control-lg rounded-pill ') }}
                        @error('name')
                        <span class="invalid-feedback d-block">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="first_name">Link</label>
                        {{ html()->text('link')->value($menu->link)->class('form-control form-control-lg rounded-pill ') }}
                        @error('link')
                        <span class="invalid-feedback d-block">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="first_name">Icon</label>
                        {{ html()->text('icon')->value($menu->icon)->class('form-control form-control-lg rounded-pill ') }}
                        @error('icon')
                        <span class="invalid-feedback d-block">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="first_name">PARENT</label>
                        {!! html()->select('menu_parent', \App\Models\Menu::when($menu->id, function($query, $id){
                            return $query->where('id', '!=', $id);
                        })->get()->pluck('name_with_parent', 'id'), $menu->menu_parent)
                        ->class('form-control form-control-lg rounded-pill')
                        ->placeholder('Pilih') !!}
                        @error('menu_parent')
                        <span class="invalid-feedback d-block">{{$message}}</span>
                        @enderror
                    </div>

                    
                    
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('menu.index')}}" class="btn btn-lg btn-outline-secondary rounded-pill me-2">Kembali</a>
                <button class="btn btn-lg btn-primary rounded-pill">Simpan</button>
            </div>

        </div>
        
        
        
    </div>
    {{ html()->form()->close() }}
@endsection