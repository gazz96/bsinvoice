<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Hotel;

class HotelController extends Controller
{

    public function index(Request $request)
    {
        $hotels = Hotel::when($request->s, function($query, $s){
            return $query->where('name', 'LIKE', '%' . $s . '%');
        })->paginate(20);
        
        return view('hotel.index', [
            'hotels' => $hotels,
        ]);
    }

    public function create(Request $request)
    {
        $id = $request->id;
        $hotel = $id ? Hotel::find($id) :  new Hotel;
        $locations = Location::orderBy('name', 'ASC')->get();
        return view('hotel.form', [
            'hotel' => $hotel,
            'locations' => $locations
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            'name' => 'required',
            'location_id' => 'required'
        ]);

        $location = Hotel::updateOrCreate(
            [
                'id' => $validated['id'] ?? '',
            ],
            [
                'name' => $validated['name'],
                'location_id' => $validated['location_id']
            ]
        );
        
        return redirect(route('hotel.index'))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');

    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }

}