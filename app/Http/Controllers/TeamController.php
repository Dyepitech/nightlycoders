<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('layouts.admin.teams.index', [
            'teams' => $teams,
        ]);
    }

    public function create()
    {
        return view('layouts.admin.teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'min:2|required',
            'lastname' => 'min:2|required',
            'role' => 'min:2|required',
            'picture' => 'min:2|image|max:2048|required',

        ]);
        if ($request->hasFile('picture')) {
            $validated['picture'] = '/storage/'.$request->file('picture')->store('picture');
        }
    
        $team = new Team;

        $team->firstname = $request->firstname;
        $team->lastname = $request->lastname;
        $team->role = $request->role;
        $team->image = $validated['picture'];

        $team->save();
        return redirect()->route('admin-index');
    }

    public function delete(Team $team)
    {
        $team->delete();

        return redirect()->route('admin-index')->with('status', 'Le membre ' . $team->name.' a été supprimée.');
    }

    public function update(Team $team, Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'min:2|required',
            'lastname' => 'min:2|required',
            'role' => 'min:2|required',
            'picture' => 'min:2|image|max:2048|required',
        ]);
        
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('picture');
        }

        $team->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role' => $request->role,
            'image' => $validated['picture'],
        ]);

        return redirect()->route('admin-index')->with('status', 'Le membre ' . $team->name .' a été modifiée.');
    }

    public function edit(Team $team)
    {
        return view('layouts.admin.teams.edit', [
            'team' => $team,
        ]);
    }
}
