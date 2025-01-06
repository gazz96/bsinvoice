@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0">REPORT</h1>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0">
                        <a href="{{ route('report.profit-loss') }}" title="Shows your business net profit and sum your revenues">PROFIT & LOSS</a>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0">
                        <a href="{{ route('report.balance-sheet') }}" title="Shows your business net profit and sum your revenues">BALANCE SHEET</a>
                    </h3>
                </div>
            </div>
                
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0">
                        <a href="" title="Shows your business net profit and sum your revenues">CASH FLOW</a>
                    </h3>
                </div>
            </div>
            
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0">
                        <a href="" title="Shows your business net profit and sum your revenues">PURCHASES BY VENDOR</a>
                    </h3>
                </div>
            </div>
            
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0">
                        <a href="" title="Shows your business net profit and sum your revenues">AGED PAYABLES</a>
                    </h3>
                </div>
            </div>
            
        </div>

    </div>
</div>    

@endsection