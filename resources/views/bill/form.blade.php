@extends('layouts.app')



@section('content')

    <div class="container p-0" style="max-width: 1280px;">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM BILL</h1>
            {{-- <div class="d-flex justify-content-end align-items-center">
                <a href="" class="btn btn-lg btn-outline-primary rounded-pill me-2 fw-bolder">PREVIEW</a>
                <a href="" class="btn btn-lg btn-primary rounded-pill fw-bolder">SIMPAN</a>
            </div> --}}
        </div>
        

        {{ html()->form('POST' , route('invoice.store'))->id('formInvoice')->open() }}
            
            {{ html()->hidden('id')->value($invoice->id)->id('invoiceId') }}

            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="shadow-lg rounded-4">
                        <div class="card rounded-4">

                            <div class="card-body p-0">
                                
                                <div class="p-3">
                                    <div class="row mb-3 justify-content-between">
                                        <div class="col-md-4">
                                            <select name="customer_id" id="i-customer_id" class="form-control form-select form-control-lg rounded-pill">
                                                <option value="">PILIH</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- <div class="row justify-content-end mb-3">
                                                <label for="i-code" class="col-4 col-form-label col-form-label-lg">NUMBER</label>
                                                <div class="col-6">
                                                    <input type="text" name="code" class="form-control form-control-lg rounded-pill" id="codeInput" value="{{ old('code', $invoice->code) }}">
                                                </div>
                                            </div> --}}

                                            <div class="row justify-content-end  mb-3">
                                                <label for="i-date" class="col-4 col-form-label col-form-label-lg">INVOICE DATE</label>
                                                <div class="col-6">
                                                    <input type="date" name="date" class="form-control form-control-lg rounded-pill" id="dateInput" value={{ old('date', $invoice->date) }}>
                                                </div>
                                            </div>

                                            <div class="row justify-content-end  mb-3">
                                                <label for="i-date" class="col-4 col-form-label col-form-label-lg">PAYMENT DUE</label>
                                                <div class="col-6">
                                                    <input type="date" name="due_date" class="form-control form-control-lg rounded-pill" id="dueDateInput" value="{{ old('due_date', $invoice->due_date) }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <table class="table mb-0" id="tableProductItems">
                                    <thead class="bg-light">
                                        <tr>
                                            <th width="10"></th>
                                            <th class="text-dark">ITEMS</th>
                                            <th class="text-dark" width="250">DESCRIPTION</th>
                                            <th class="text-dark" width="100">QUANTITY</th>
                                            <th class="text-dark" width="150">PRICE</th>
                                            <th class="text-dark text-end" width="100">AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoice->items ?? [] as $item)
                                        <tr class="row-data row-{{$item->product_id}}" data-id="{{$item->product_id}}">
                                            <td></td>
                                            <td>{{$item->product->name ?? ''}}</td>
                                            <td>
                                                <input type="text" name="products[{{$item->product_id}}][description]" class="form-control rounded-pill" value="{{$item->description}}" placeholder="Enter item description">
                                            </td> 
                                            <td>
                                                <input type="text" name="products[{{$item->product_id}}][qty]" class="form-control rounded-pill form-qty" value="{{$item->qty}}">
                                            </td> 
                                            <td>
                                                <input type="text" name="products[{{$item->product_id}}][price]" class="form-control rounded-pill form-price" value="{{ $item->price }}">
                                            </td>
                                            <td class="td-amount text-end">{{$item->price * $item->qty}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th colspan="5">
                                                <a href="#modalProductItems" data-bs-toggle="modal" class="text-primary">
                                                    <span data-lucide="circle-plus" class="me-2"></span>
                                                    <span>TAMBAH ITEM</span>
                                                </a>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="p-3 border-top">
                                    <label for="" class="fw-bolder">Notes</label>
                                    {{ html()->textarea('notes')->class('w-100 border-0')->placeholder('Masukan Catatan')->value($invoice->notes) }}
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{-- <a href="#modalProductItems" data-bs-toggle="modal" class="btn btn-lg btn-outline-primary rounded-pill me-2 fw-bolder" id="btnPreview">PREVIEW</a> --}}
                        <button class="btn btn-lg btn-primary rounded-pill fw-bolder" id="btnSaveInvoice">SIMPAN</button>
                    </div>

                </div>

            </div>

        {{ html()->form()->close() }}

    </div>

@endsection


@section('footer')


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="modalProductItems"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Product
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Pilih Product & Service</label>
                    <select  id="selectProductId" class="form-control form-select">
                        <option value="">Pilih</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}" data-product='{{$product}}'>{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="btnAddProduct">Save</button>
            </div>
        </div>
    </div>
</div>


    <script type="text/template" id="rowTemplate">
        <tr class="row-data row-<%= id %>" data-id="<%= id %>">
            <td></td>
            <td>
                <%= name %>
            </td>
            <td>
                <input type="text" name="products[<%= id %>][description]" class="form-control rounded-pill" value="<%= description %>" placeholder="Enter item description">
            </td> 
            <td>
                <input type="text" name="products[<%= id %>][qty]" class="form-control rounded-pill form-qty" value="<%= qty %>">
            </td> 
            <td>
                <input type="text" name="products[<%= id %>][price]" class="form-control rounded-pill form-price" value="<%= price %>">
            </td>
            <td class="td-amount text-end"><%= amount %></td>
        </tr>
    </script>
    <script>
        
        var formInvoice = $('#formInvoice');
        var tableProductItemsElement = $('#tableProductItems');
        var rowTemplate = _.template($('#rowTemplate').html())

        function checkBeforeInsert(id, cb)
        {
            let find = tableProductItemsElement.find('tbody').find('.row-' + id);
            if(!find.length) {
                cb();
                return;
            }

            const formQtyInput = find.find('.form-qty');
            const formPriceInput = find.find('.form-price');

            let qty = parseInt(formQtyInput.val()) + 1;
            let price = parseInt(formPriceInput.val());
            
            formQtyInput.val(qty);
            find.find('.td-amount').html(qty * price);
            

        }

        $(document).on('click', '#btnAddProduct', function(e){
            e.preventDefault();
            let selectProductIdInput = $('#selectProductId');
            let product = selectProductIdInput.find('option:selected').data('product');
            console.log('product', product.name);
            checkBeforeInsert(product.id, function() {
                tableProductItemsElement.find('tbody').append(
                rowTemplate({
                        name: product.name, 
                        id: product.id,
                        description: '',
                        qty: 1, 
                        price: product.price,
                        amount: product.price
                    })
                )
            })
            
        });


        $(document).on('keyup', '.form-price', function(){
            let find = $(this).closest('tr');

            const formQtyInput = find.find('.form-qty');
            const formPriceInput = find.find('.form-price');

            let qty = parseInt(formQtyInput.val());
            let price = parseInt(formPriceInput.val());
            
            formQtyInput.val(qty);
            find.find('.td-amount').html(qty * price);
        });

        async function saveInvoice()
        {

            const response = await $.ajax({
                method: 'POST',
                url: "{{route('invoice.store')}}",
                data: $('#formInvoice').serialize()
            });

            return response;

        }

        $(document).on('click', '#btnSaveInvoice', async function(e){
            e.preventDefault();
            try {
                const response = await saveInvoice();
                $('#invoiceId').val(response.id);
                Toastify({
                    text: 'Berhasil menyimpan',
                    close: true,
                    style: {
                        background: "linear-gradient(#3f80ea, #3f80ea)"
                    }
                })
                .showToast();
            }
            catch(error) {
                if(error.status == 422){
                    App.Helpers.handleValidationErrors(error.responseJSON.errors)
                }
                
            }
            finally {

            }
            
        });

        $('#i-customer_id').select2({
            width: '100%',
            allowClear: true
        });

        $('#selectProductId').select2({
            width: '100%',
            allowClear: true,
            dropdownParent: $('#modalProductItems')
            
        })

       

    </script>

   

@endsection
