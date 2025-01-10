<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{

    public function index(Request $request)
    {
        $locations = Location::when($request->s, function($query, $s){
            return $query->where('name', 'LIKE', '%' . $s . '%');
        })->paginate(20);
        
        return view('location.index', [
            'locations' => $locations,
        ]);
    }

    public function create(Request $request)
    {
        $id = $request->id;
        $location = $id ? Location::find($id) :  new Location;
        return view('location.form', [
            'location' => $location
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            'name' => 'required'
        ]);

        $location = Location::updateOrCreate(
            [
                'id' => $validated['id'] ?? '',
            ],
            [
                'name' => $validated['name']
            ]
        );
        
        return redirect(route('location.index'))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');

    }

    public function destroy(Location $location)
    {
        $location->delete();
        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }

}