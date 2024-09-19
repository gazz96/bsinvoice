@extends('layouts.app')



@section('content')

    <div class="container-fluid p-0">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM PRODUCT</h1>
        </div>
        

        {{ html()->form($product->id ? 'PUT' : 'POST' , $product->id ? route('product.update', $product) : route('product.store'))->open() }}


            <div class="row">

                <div class="col-md-4">

                    <div class="card border rounded-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">NAMA</label>
                                {{ html()->text('name')->class('form-control form-control-lg rounded-pill')->value(old('name', $product->name)) }}
                                @error('name')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">DESKRIPSI</label>
                                {{ html()->textarea('description')->class('form-control form-control-lg rounded-4')->value(old('description', $product->description)) }}
                                @error('description')
                                <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">HARGA</label>
                                {{ html()->text('price')->class('form-control form-control-lg rounded-pill')->value(old('price', $product->price)) }}
                            </div>

                            <div class="mb-3">
                                <label for="">STATUS</label>
                                {{ html()->select('status')->options([
                                    'AKTIF' => 'AKTIF', 
                                    'TIDAK AKTIF' => 'TIDAK AKTIF'
                                ])->class('form-control form-control-lg rounded-pill')->value(old('status   ', $product->status)) }}
                            </div>



                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{route('product.index')}}" class="btn btn-lg btn-outline-primary rounded-pill me-2">KEMBALI</a>
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
