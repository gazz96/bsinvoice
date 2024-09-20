@extends('layouts.app')



@section('content')

    <div class="container p-0" style="max-width: 1280px;">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM EXPENSE</h1>
    
        </div>
        

        {{ html()->form('POST' , route('expense.store'))->id('formExpense')->open() }}
            
            {{ html()->hidden('id')->value($expense->id)->id('expenseId') }}

            <div class="row">

                <div class="col-12 col-md-5">
                    <div class="shadow-lg rounded-4">
                        <div class="card rounded-4">

                            <div class="card-body">
                                
                                <div class="mb-3">
                                    <label for="">NAME</label>
                                    {{ html()->text('name')->value($expense->name)->class('form-control form-control-lg rounded-pill ') }}
                                    @error('name')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">DESCRIPTION</label>
                                    {{ html()->text('description')->value($expense->description)->class('form-control form-control-lg rounded-pill ') }}
                                    @error('description')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">DATE</label>
                                    {{ html()->date('expense_date')->value($expense->expense_date)->class('form-control form-control-lg rounded-pill ') }}
                                    @error('expense_date')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">AMOUNT</label>
                                    {{ html()->text('amount')->value($expense->amount)->class('form-control form-control-lg rounded-pill ') }}
                                    @error('amount')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{-- <a href="#modalProductItems" data-bs-toggle="modal" class="btn btn-lg btn-outline-primary rounded-pill me-2 fw-bolder" id="btnPreview">PREVIEW</a> --}}
                        <button class="btn btn-lg btn-primary rounded-pill fw-bolder">SIMPAN</button>
                    </div>

                </div>

            </div>

        {{ html()->form()->close() }}

    </div>

@endsection


@section('footer')

@endsection
