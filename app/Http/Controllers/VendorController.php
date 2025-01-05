<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $vendors = Vendor::when($request->s, function($query, $s){
            return $query->where('name', 'LIKE', '%' . $s . '%');
        })->paginate(20);
        
        return view('vendor.index', [
            'vendors' => $vendors,
        ]);
    }

    public function create()
    {
        return view('vendor.form', [
            'vendor' => new Vendor
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            'name' => 'required',
            'email' => 'email',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'postal_code' => 'nullable'
        ]);


        $vendorId = $validated['id'] ?? null;
        
        $vendor = Vendor::updateOrCreate(
            ['id' => $vendorId],
            $validated
        );

        return redirect(route('vendor.index'))
            ->with('status', 'success')
            ->with('message', 'Berhasim menyimpan');
    }
 
    public function edit(Vendor $vendor)
    {
        return view('vendor.form', [
            'vendor' => $vendor
        ]);
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}
