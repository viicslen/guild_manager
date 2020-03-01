<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('characters.home')->with([
            'characters' => $user->characters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('characters.character');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $character = new Character();
        $character->name = $request->input('name');
        $character->class = $request->input('class');
        $character->level = $request->input('level');
        $character->ap = $request->input('ap');
        $character->aap = $request->input('aap');
        $character->dp = $request->input('dp');
        $character->knowledge = $request->input('knowledge');
        $character->user_id = Auth::user()->id;
        $character->save();

        $gear_picture = $request->file('gear-picture');
        if (!empty($gear_picture)) {
            $character->gear_picture = 'images/'.$gear_picture->storeAs('gear', $character->uuid.".".$gear_picture->getClientOriginalExtension());
            $character->save();
        }

        return response()->redirectTo('account/characters')->with('success', "$character->name saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($uuid)
    {
        $character = Character::whereUuid($uuid)->first();
        if (!$character->exists())
            return redirect()->back()->with('error', 'Character not found');
        return view('characters.character')->with('character', $character);
    }
    public function edit($uuid) {return $this->show($uuid);}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        //return dd($request);
        $character = Character::whereUuid($uuid)->first();
        if (!$character->exists())
            return redirect()->back()->with('error', 'Character not found');
        if ($character->user->id !== Auth::user()->id)
            return redirect('account/characters')->with('error', 'You are not authorized to make changes to this character');

        $character->name = $request->input('name');
        $character->class = $request->input('class');
        $character->level = $request->input('level');
        $character->ap = $request->input('ap');
        $character->aap = $request->input('aap');
        $character->dp = $request->input('dp');
        $character->knowledge = $request->input('knowledge');
        $character->save();

        $gear_picture = $request->file('gear-picture');
        if (!empty($gear_picture)) {
            $character->gear_picture = 'images/'.$gear_picture->storeAs('gear', $character->uuid.".".$gear_picture->getClientOriginalExtension());
            $character->save();
        }

        return redirect('account/characters')->with('success', "$character->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $character = Character::whereUuid($uuid)->first();
        if (!$character->exists())
            return redirect()->back()->with('error', 'Character not found');
        if ($character->user->id !== Auth::user()->id)
            return redirect('account/characters')->with('error', 'You are not authorized');

        if (Storage::exists($character->gear_picture)) Storage::delete($character->gear_picture);

        $character_name = $character->name;
        $character->delete();
        return redirect('account/characters')->with('info', "$character_name deleted successfully");
    }
}
