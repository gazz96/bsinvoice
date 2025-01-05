@extends('layouts.app')

@section('header')

<style>
    
    .invoice-wrapper{
        box-shadow: 0 2px 8px #0003
    }

    .invoice .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    
    .invoice .invoice-header > div {
        width: 100%;
    }
    
    .invoice .invoice-header > div:last-child {
        text-align: center;
        width: 320px;
    }
    
    .table-no-gap th, 
    .table-no-gap td {
        padding: 0 ;
    }
</style>

@endsection

@section('content')
    <div class="container p-0 mx-auto" style="max-width: 800px">

        <div class="mb-3 d-flex justify-content-between align-items-center" id="invoice-nav">
            <h1 class="h2 mb-0 fw-bold">PREVIEW INVOICE</h1>

            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-primary rounded-pill" href="javascript:void(0)" onclick="window.history.back()">
                    <span data-lucide="arrow-left"></span>
                    <span class="fw-bold">BACK</span>
                </a>
            </div>
        </div>
        

        <div class="row">
            <div class="col-12">
                <div class="mx-auto my-3" style="width: 100%; max-width: 800px;">
                    <!--preview actions-->
                    <div></div>
                    
                    <!--preview invoice-->
                    <div class="invoice shadow-lg border">
                        <div class="invoice-header bg-light">
                            <div class="invoice-label h2 mb-0 p-4">INVOICE</div>
                            <div class="p-4 bg-secondary">
                                <div class="h6 text-bg-secondary">Amount</div>
                                <div class="invoice-amount h2 mb-0 text-white bg-secondary">{{ number_format($invoice->amount) }}</div>
                            </div>
                        </div>
                        
                        <div class="invoice-meta">
                            <div class="d-flex justify-content-between">
                                <div class="p-4">
                                    <p class="text-secondary h6">BILL TO</p>
                                    <p class="text-dark h5"><?php echo $invoice->customer->email; ?></p>
                                </div>
                                <div class="p-4">
                                    <table class="table table-sm table-borderless table-no-gap">
                                        <tr>
                                            <th>NO:</th>
                                            <td>{{$invoice->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>DATE: </th>
                                            <td>{{$invoice->date}}</td>
                                        </tr>
                                        @if($invoice->due_date)
                                        <tr>
                                            <th>DUE DATE: </th>
                                            <td>{{$invoice->due_date}}</td> 
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ITEMS</th>
                                        <th>QTY</th>
                                        <th>PRICE</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoice->items as $item)
                                    <tr class="bg-light">
                                        <td>{{$item->product->name ?? ''}}</td>
                                        <td>{{number_format($item->qty)}}</td>
                                        <td>{{number_format($item->price)}}</td>
                                        <td>{{number_format($item->qty * $item->price)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th>TOTAL</th>
                                        <th>{{ number_format($invoice->amount) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            <div class="invoice-notes p-4">
                                <div>
                                    <h6 class="fw-bolder">NOTES/TERMS</h6>
                                    <div>{{$invoice->notes}}</div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer')

<script>
    $('#sidebar').remove();
    $('.navbar').remove();
    $('#invoice-nav').remove();
    $('.footer').remove();
    window.print();
</script>
@endsection