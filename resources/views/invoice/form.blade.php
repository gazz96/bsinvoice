@extends('layouts.app')



@section('content')

    <div class="container p-0" style="max-width: 1000px;">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM INVOICE</h1>
            {{-- <div class="d-flex justify-content-end align-items-center">
                <a href="" class="btn btn-lg btn-outline-primary rounded-pill me-2 fw-bolder">PREVIEW</a>
                <a href="" class="btn btn-lg btn-primary rounded-pill fw-bolder">SIMPAN</a>
            </div> --}}
        </div>
        

        {{ html()->form($invoice->id ? 'PUT' : 'POST' , $invoice->id ? route('invoice.update', $invoice) : route('invoice.store'))->open() }}


            <div class="row">

                <div class="col-12 col-md-12">



                    <div class="card">

                        <div class="card-body p-0">
                            
                            <div class="p-3">
                                <div class="row mb-3 justify-content-between">
                                    <div class="col-md-4">
                                        <select name="customer_id" id="" class="form-control form-select form-control-lg rounded-pill">
                                            <option value="">PILIH CUSTOMER</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row justify-content-end mb-3">
                                            <label for="i-code" class="col-4 col-form-label col-form-label-lg">NUMBER</label>
                                            <div class="col-6">
                                            <input type="text" name="code" class="form-control form-control-lg rounded-pill" id="i-code">
                                            </div>
                                        </div>

                                        <div class="row justify-content-end  mb-3">
                                            <label for="i-date" class="col-4 col-form-label col-form-label-lg">INVOICE DATE</label>
                                            <div class="col-6">
                                            <input type="date" name="date" class="form-control form-control-lg rounded-pill" id="i-date">
                                            </div>
                                        </div>

                                        <div class="row justify-content-end  mb-3">
                                            <label for="i-date" class="col-4 col-form-label col-form-label-lg">PAYMENT DUE</label>
                                            <div class="col-6">
                                            <input type="date" name="date" class="form-control form-control-lg rounded-pill" id="i-date">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <table class="table mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="10"></th>
                                        <th class="text-dark">ITEMS</th>
                                        <th class="text-dark">QUANTITY</th>
                                        <th class="text-dark">PRICE</th>
                                        <th class="text-dark">AMOUNT</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th colspan="4">
                                            <a href="" class="text-primary">
                                                <span data-lucide="circle-plus" class="me-2"></span>
                                                <span>TAMBAH ITEM</span>
                                            </a>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="p-3 border-top">
                                <label for="" class="fw-bolder">Notes</label>
                                {{ html()->textarea('notes')->class('w-100 border-0')->placeholder('Masukan Catatan') }}
                            </div>
                        </div>



                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="" class="btn btn-lg btn-outline-primary rounded-pill me-2 fw-bolder">PREVIEW</a>
                        <button class="btn btn-lg btn-primary rounded-pill fw-bolder">SIMPAN</button>
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
