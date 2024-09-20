<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = Invoice::paginate(20);
        return view('invoice.index', [
            'invoices' => $invoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice.form', [
            'invoice' => new Invoice(),
            'customers' => Customer::orderBy('name', 'ASC')->get(),
            'products' => Product::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'id' => 'nullable',
            //'code' => 'nullable',
            'customer_id' => 'required',
            'date' => 'required',
            'due_date' => 'nullable',
            'products' => 'required',
            'notes' => 'nullable'
        ]);

        $invoiceId = $validated['id'] ?? '';
        
        if(!$invoiceId)
        {
            $validated['status'] = 'DRAFT';
        }

        $invoice = Invoice::updateOrCreate(
            ['id' => $invoiceId],
            $validated 
        );

        $products = collect($validated['products']);
        $products->each(function($product, $productId) use ($invoice) {
            $invoice->items()
                ->updateOrCreate(
                    [
                        'product_id' =>  $productId
                    ],
                    [
                        'description' => $product['description'],
                        'price' => $product['price'],
                        'qty' => $product['qty'],
                    ]
                );
        });

        return response()
            ->json($invoice->load('items'), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoice.form', [
            'invoice' => $invoice,
            'customers' => Customer::orderBy('name', 'ASC')->get(),
            'products' => Product::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
