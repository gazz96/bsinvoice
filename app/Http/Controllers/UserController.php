<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserTeam;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
 
    public function index(Request $request)
    {
        $users = User::when($request->s, function($query, $keyword){
            return $query->where(function($query) use($keyword){
                return $query->where('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('email', 'LIKE', '%'.$keyword.'%');
            });
        })
        ->latest()
        ->paginate(20);
        
        return view('user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.form', [
            'user' => new User(),
            'teams' => Team::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'status' => 'required',
            'team_id' => 'required'
        ]);
        
        $validated['password'] = Hash::make($validated['password']);        

        $user = User::create($validated);
        
        foreach($request->team_id as $team_id)
        {
            $user->teams()->create([
                'team_id' => $team_id
            ]);
        }

        return redirect(route('user.index'))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    public function show(User $user)
    {
        
    }

    public function edit(User $user)
    {
        return view('user.form', [
            'user' => $user,
            'teams' => Team::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'name' => 'required|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'status' => 'required',
            'team_id' => 'required'
        ]);
        
        
        
        if(empty($validated['password']))
        {
            unset($validated['password']);
        }
        
        if($validated['password'] ?? '')
        {
            $validated['password'] = Hash::make($validated['password']);
        }
        
        $user->update($validated);
        
        UserTeam::where('user_id', $user->id)
            ->whereNotIn('team_id', $validated['team_id'])
            ->delete();
            
        foreach($validated['team_id'] as $team_id)
        {
            $user->teams()->firstOrCreate(
                [
                    'user_id' => $user->id,
                    'team_id' => $team_id
                ]
            );
        }

        return redirect(route('user.edit', $user))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    public function destroy(User $user)
    {
        //
    }
}