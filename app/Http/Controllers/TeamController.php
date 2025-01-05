<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    
    public function index(Request $request)
    {
        $teams = Team::when($request->s, function($query, $s){
            return $query->where('name', 'LIKE', '%' . $s . '%');
        })->paginate(20);
        
        return view('team.index', [
            'teams' => $teams,
        ]);
    }

    public function create(Team $team)
    {
        return view('team.form', [
            'team' => $team
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            'name' => 'required',
            'status' => 'required'
        ]);


        $teamId = $validated['id'] ?? null;
        
        $team = Team::updateOrCreate(
                ['id' => $teamId],
                $validated
            );

        return redirect(route('team.index'))
            ->with('status', 'success')
            ->with('message', 'Berhasim menyimpan');
    }
 
    public function edit(Team $team)
    {
        return view('team.form', [
            'team' => $team
        ]);
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}
