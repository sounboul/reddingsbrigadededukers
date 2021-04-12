<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        //Load groups
        $groups = Group::get();
        return inertia('Groepen/Index', [
            'groups' => $groups,
        ]);
    }

    public function store(CreateGroupRequest $request)
    {
        Group::create($request->validated());
        return redirect()->back()->with('message', 'Groep succesvol aangemaakt');
    }

    public function show($name)
    {
        $group = Group::with('members')->where('name',$name)->first();
        return inertia('Groepen/Show', [
            'group' => $group,
        ]);
    }

    public function update(UpdateGroupRequest $request)
    {

        Group::find($request->input('id'))->update($request->validated());
        return redirect()->route('groepen.show', $request->input('name'));
    }
    
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Group::find($request->input('id'))->delete();
            return redirect()->route('groepen.index');
        }
    }
}
