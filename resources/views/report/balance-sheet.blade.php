@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0">BALANCE SHEET</h1>
    </div>

    <div class="row mb-3">
        
        <div class="col-md-12">
            <form>
                <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Tahun</label>
                            <select class="form-control form-control-lg form-select rounded-pill" name="year">
                                @foreach($years as $year)
                                
                                    <option value="{{$year}}" {{ $year == request('year') ? 'selected' : '' }}>{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Report Type</label>
                            <select name="status" class="form-control form-control-lg form-select rounded-pill">
                                <option value="1" {{ request('status') == 1 ? 'selected' : ''}}>Paid & Unpaid</option>
                                <option value="2" {{ request('status') == 2 ? 'selected' : ''}}>Paid</option>
                            </select>
                        </div>
                        
                        <div class="col-md-2">
                            <label>&nbsp; </label>
                            <button class="d-block btn btn-lg btn-primary rounded-pill">Update Report</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="col-12 mb-3">
            <div class="d-flex gap-4 align-items-center">
                <div class="col">
                    <small class="fw-bold">CASH AND BANK</small>
                    <div class="h1 fw-normal">{{ number_format($income) }}</div>
                </div>
                <div class="col text-center fw-bolder h1">+</div>
                <div class="col">
                    <small class="fw-bold">TO BE RECEIVED</small>
                    <div class="h1 fw-normal">{{ number_format($invoice) }}</div>
                </div>
                <div class="col text-center fw-bolder h1">-</div>
                <div class="col">
                    <small class="fw-bold">TO BE PAID OUT</small>
                    <div class="h1 fw-normal">{{ number_format($bill) }}</div>
                </div>
                <div class="col text-center fw-bolder h1">=</div>
                <div class="col">
                    <small class="fw-bold">&nbsp; </small>
                    <div class="h1 fw-normal {{ $net < 0 ? 'text-danger' : 'text-success' }}">{{ number_format($income + $invoice - $bill) }}</div>
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
                </thead>r
                <tbody>
                    <tr class="text-bg-secondary">
                        <td colspan="2" class="fw-bolder">ASSETS</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">TOTAL CASH AND BANK</td>
                        <td width="150" class="text-end">{{ number_format($income + $invoice) }}</td>
                    </tr>
                    
                    <tr>
                        <td class="fw-bold">TOTAL OTHER CURRENT ASEETS</td>
                        <td width="150" class="text-end">{{ number_format(0) }}</td>
                    </tr>
                    
                    <tr>
                        <td>TOTAL ASSETS</td>
                        <td width="150" class="text-end fw-bold">{{ number_format($income + $invoice) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    
                     <tr class="text-bg-secondary">
                        <td colspan="2" class="fw-bolder">LIABILITIES</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">ACCOUNT PAYABLE</td>
                        <td width="150" class="text-end">{{ number_format($bill) }}</td>
                    </tr>
                    <tr>
                        <td>TOTAL LIABILITIES</td>
                        <td width="150" class="text-end fw-bold">{{ number_format($bill) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>    

@endsection