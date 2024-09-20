<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bills = Bill::paginate(20);
        return view('bill.index', [
            'bills' => $bills,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bill.form', [
            'bill' => new Bill(),
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

        $billId = $validated['id'] ?? '';
        
        if(!$billId)
        {
            $validated['status'] = 'DRAFT';
        }

        $bill = Bill::updateOrCreate(
            ['id' => $billId],
            $validated 
        );

        $products = collect($validated['products']);
        $products->each(function($product, $productId) use ($bill) {
            $findProduct = Product::find($productId);
            if($findProduct)
            {
                $bill
                    ->items()
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
            }
        });

        return response()
            ->json($bill->load('items'), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return view('bill.form', [
            'bill' => $bill,
            'customers' => Customer::orderBy('name', 'ASC')->get(),
            'products' => Product::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
