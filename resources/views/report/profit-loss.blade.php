@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0">PROFIT & LOSS</h1>
    </div>

    <div class="row mb-3">
        
        <div class="col-md-12">
            <form>
                <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Date Range</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control form-control-lg form-select rounded-pill" name="year">
                                @foreach($years as $year)
                                    <option value="{{$year}}" {{ $year == request('year') ? 'selected' : '' }}>{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="start_date" class="form-control form-control-lg rounded-pill" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="end_date" class="form-control form-control-lg rounded-pill" value="{{ request('end_date') }}">
                        </div>
                        
                        <div class="col-md-2">
                            <select name="status" class="form-control form-control-lg form-select rounded-pill">
                                <option value="1" {{ request('status') == 1 ? 'selected' : ''}}>Paid & Unpaid</option>
                                <option value="2" {{ request('status') == 2 ? 'selected' : ''}}>Paid</option>
                            </select>
                        </div>
                        
                        <div class="col-md-2">
                            <button class="btn btn-lg btn-primary rounded-pill">Update Report</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="col-12 mb-3">
            <div class="d-flex gap-4 align-items-center">
                <div class="col">
                    <small class="fw-bold">INCOME</small>
                    <div class="h1 fw-normal">{{ number_format($income + $invoice) }}</div>
                </div>
                <div class="col text-center fw-bolder h1">-</div>
                <!--<div class="col">-->
                <!--    <small class="fw-bold">PRODUCTS & SERVICES SOLD</small>-->
                <!--    <div class="h1 fw-normal">{{ number_format($invoice) }}</div>-->
                <!--</div>-->
                <!--<div class="col text-center fw-bolder h1">-</div>-->
                <div class="col">
                    <small class="fw-bold">OPERATING EXPENSES</small>
                    <div class="h1 fw-normal">{{ number_format($expense) }}</div>
                </div>
                <div class="col text-center fw-bolder h1">=</div>
                <div class="col">
                    <small class="fw-bold">NET PROFIT</small>
                    <div class="h1 fw-normal {{ $net < 0 ? 'text-danger' : 'text-success' }}">{{ number_format($income + $invoice - $expense) }}</div>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ACCOUNTS</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-bg-secondary">
                        <td colspan="2" class="fw-bolder">INCOME</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">SALES</td>
                        <td width="150" class="text-end">{{ number_format($invoice) }}</td>
                    </tr>
                    
                    <tr>
                        <td class="fw-bold">ADDITIONAL</td>
                        <td width="150" class="text-end">{{ number_format($income) }}</td>
                    </tr>
                    
                    <tr>
                        <td>TOTAL INCOME</td>
                        <td width="150" class="text-end fw-bold">{{ number_format($income + $invoice) }}</td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr class="text-bg-secondary">
                        <td colspan="2" class="fw-bolder">EXPENSE</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">OPERATING</td>
                        <td width="150" class="text-end">{{ number_format($expense) }}</td>
                    </tr>
                    
                    <tr>
                        <td>TOTAL EXPENSE</td>
                        <td width="150" class="text-end fw-bold">{{ number_format($expense) }}</td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr class="text-bg-secondary">
                        <td class="fw-bolder">NET PROFIT</td>
                        <td class="text-end">{{ number_format($net) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>    

@endsection