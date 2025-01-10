@extends('layouts.app')

@section('header')
<style>
    #tableNumberOfRooms tr td,
    #tableService tr td, 
    #tableMain tr td {
        padding: 0 !important;
    }

    #tableNumberOfRooms tr td input,
    #tableMain tr td input,
    #tableMain tr td select,
    #tableService tr td input {
        border: 0
    }
</style>
@endsection

@section('content')

    <div class="container p-0" style="max-width: 1280px;">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM PACKAGE</h1>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-0 fw-bolder">TOTAL</p>
                        <p id="elementGrandTotal" class="mb-0">0</p>
                    </div>
                </div>
            </div>
        </div>
        

        {{ html()->form('POST' , route('package.store'))->id('formPackage')->open() }}
            
            {{ html()->hidden('id')->value($package->id)->id('packageId') }}

            <div class="row">

                <div class="col-12 col-md-12">
                    
                    <div class="mb-3 bg-white shadow-lg">
                        <table class="table table-sm table-bordered mb-0" id="tableMain">
                            <tr>
                                <th class="text-center" colspan="9">
                                    PLANNING & PRICING
                                </th>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <select name="customer_id" id="customer_id" class="form-control form-control-sm form-select bg-light">
                                        <option value="">PILIH TRAVEL</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                                <td colspan="2" class="bg-light">
                                    <input name="pax" type="number" class="form-control form-control-sm bg-light" placeholder="PAX">
                                </td>
                                <td colspan="2" class="bg-light">
                                    <input name="free_pax" type="number" class="form-control form-control-sm bg-light" placeholder="FREE PAX">
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" width="150">HOTEL</th>
                                <th class="text-center">FROM</th>
                                <th class="text-center">TO</th>
                                <th class="text-center">NIGHT</th>
                                <th class="text-center">QUAD</th>
                                <th class="text-center">TRIPLE</th>
                                <th class="text-center">DOUBLE</th>
                                <th class="text-center">MAKAN</th>
                            </tr>

                            <tr>
                                <td>
                                    <select name="madinah_hotel_id" id="" class="form-control form-control-sm">
                        
                                        @foreach ($hotelMadinah as $hotel)
                                            <option value="{{$hotel->id}}">MADINAH - {{$hotel->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="madinah_from_date" type="date" class="form-control form-control-sm bg-light">
                                </td>
                                <td>
                                    <input name="madinah_to_date" type="date" class="form-control form-control-sm bg-light">
                                </td>
                                <td>
                                    <input name="madinah_night" type="number" class="form-control form-control-sm bg-light text-center">
                                </td>
                                <td>
                                    <input name="madinah_quad" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                                <td>
                                    <input name="madinah_triple" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                                <td>
                                    <input name="madinah_double" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                                <td>
                                    <input name="madinah_food" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <select name="makkah_hotel_id" id="" class="form-control form-control-sm">
                                        @foreach ($hotelMakkah as $hotel)
                                            <option value="{{$hotel->id}}">MAKKAH - {{$hotel->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="makkah_from_date" type="date" class="form-control form-control-sm bg-light">
                                </td>
                                <td>
                                    <input name="makkah_to_date" type="date" class="form-control form-control-sm bg-light">
                                </td>
                                <td>
                                    <input name="makkah_night" type="number" class="form-control form-control-sm bg-light text-center">
                                </td>
                                <td>
                                    <input name="makkah_quad" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                                <td>
                                    <input name="makkah_triple" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                                <td>
                                    <input name="makkah_double" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                                <td>
                                    <input name="makkah_food" type="number" class="form-control form-control-sm bg-light text-end">
                                </td>
                            </tr>
                            
                        </table>
                    </div>

                    <div class="mb-3 bg-white shadow-lg">
                        <table class="table table-sm table-bordered mb-0" id="tableNumberOfRooms">
                            <tr>
                                <th class="text-center" colspan="6">NUMBER OF ROOMS</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center">MADINAH</th>
                                <th colspan="3" class="text-center">MAKKAH</th>
                            </tr>
                            <tr>
                                <th class="text-center">QUAD</th>
                                <th class="text-center">TRIPLE</th>
                                <th class="text-center">DOUBLE</th>
                                <th class="text-center">QUAD</th>
                                <th class="text-center">TRIPLE</th>
                                <th class="text-center">DOUBLE</th>
                            </tr>

                            <tr>
                                <td><input type="number" name="madinah_quad_qty" class="form-control form-control-sm text-center bg-light" value="0"></td>
                                <td><input type="number" name="madinah_triple_qty" class="form-control form-control-sm text-center bg-light" value="0"></td>
                                <td><input type="number" name="madinah_double_qty" class="form-control form-control-sm text-center bg-light" value="0"></td>
                                <td><input type="number" name="makkah_quad_qty" class="form-control form-control-sm text-center bg-light" value="0"></td>
                                <td><input type="number" name="makkah_triple_qty" class="form-control form-control-sm text-center bg-light" value="0"></td>
                                <td><input type="number" name="makkah_double_qty" class="form-control form-control-sm text-center bg-light" value="0"></td>
                            </tr>
                            
                        </table>
                    </div>

                    <div class="mb-3 bg-white shadow-lg">
                        <table class="table table-sm table-bordered mb-0" id="tableService">
                            <tr>
                                <th class="text-center" colspan="8">SERVICES</th>
                            </tr>
                            <tr>
                                <th class="text-center">DESCRIPTION</th>
                                <th class="text-center" width="80">QTY</th>
                                <th class="text-center" width="200">PRICE</th>
                                <th class="text-center" width="200">SUBTOTAL</th>
                            </tr>

                            @foreach ([
                                'MAKAN MADINAH',
                                'MAKAN MAKKAH',
                                'NASI BOX',
                                'ZAM ZAM',
                                'MUTAWIF',
                                'JASA'
                            ] as $index => $value)

                            <tr>
                                <td class="text-start">
                                    {{ $value }}
                                    <input type="hidden" name="services[{{$index}}][name]" value="{{$value}}">
                                </td>
                                <td>
                                    <input type="text" name="services[{{$index}}][qty]" class="form-control form-control-sm text-center inputQty  bg-light" value="1">
                                </td>
                                <td>
                                    <input type="text" name="services[{{$index}}][price]" class="form-control form-control-sm text-end inputPrice bg-light" value="0">
                                </td>
                                <td class="text-end">
                                    <input type="text" class="form-control form-control-sm text-end inputTotal" readonly value="0">
                                </td>
                            </tr>
                                
                            @endforeach
                         

                            

                        </table>
                    </div>
                               

                    <div class="d-flex justify-content-end">
                        {{-- <a href="#modalProductItems" data-bs-toggle="modal" class="btn btn-lg btn-outline-primary rounded-pill me-2 fw-bolder" id="btnPreview">PREVIEW</a> --}}
                        <a href="{{ route('location.index') }}" class="btn btn-lg btn-outline-primary fw-bolder rounded-pill me-2">KEMBALI</a>
                        <button class="btn btn-lg btn-primary rounded-pill fw-bolder">SIMPAN</button>
                    </div>

                </div>

            </div>

        {{ html()->form()->close() }}

    </div>

@endsection


@section('footer')
<script> 

    function totalCalc() {
    
    }

    function calcSubTotal(element) {
        let tr = $(element).parent().parent();
        let qty = parseInt(tr.find('.inputQty').val());
        let price = parseInt(tr.find('.inputPrice').val());
        let subTotal = qty * price;

        if(isNaN(qty)) {
            qty = 0;
        }

        if(isNaN(price)) {
            price = 0;
        }

        if(isNaN(subTotal))  {
            subTotal = 0;
        }
        tr.find('.inputTotal').val(subTotal)
    }

    $(document).on('keyup', '.inputQty', function(){
        calcSubTotal($(this));
    });

    $(document).on('keyup', '.inputPrice', function(){
        calcSubTotal(this);
    })

    function calculateNight(element) {
        let parent = $(element).parent().parent();
        let fromInputElement = parent.find(`td:nth-child(2)`).find('input');
        let toInputElement = parent.find(`td:nth-child(3)`).find('input');

        let fromDate = new  Date(fromInputElement.val());
        let toDate = new Date(toInputElement.val());

        let differenceTime = Math.abs(fromDate - toDate);
        let differenceDay = Math.ceil(differenceTime / (1000 * 60 * 60 * 24));
        
        let item = parent.find(`td:nth-child(4)`).find('input').val(differenceDay);
    }

    $(document).on('change', '[name=madinah_from_date]', function(){
        calculateNight(this); 
    });

    $(document).on('change', '[name=madinah_to_date]', function(){
        calculateNight(this); 
    });

    $(document).on('change', '[name=makkah_from_date]', function(){
        calculateNight(this); 
    });

    $(document).on('change', '[name=makkah_to_date]', function(){
        calculateNight(this); 
    });

</script>
@endsection
