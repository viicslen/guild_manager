<?php

namespace App\Http\Controllers;

use App\Enums\GuildRequirement;
use App\Models\Guild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuildsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->view('guilds.home', ['guilds' => Guild::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('guilds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //return dd($request);
        $guild = Guild::create([
            'owner_id' => Auth::user()->id,
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'description' => $request->get('description'),
            'requirements' => [
                [
                    'requirement' => GuildRequirement::NodeWar,
                    'quantity' => $request->get('required-war-quantity'),
                    'interval' => $request->get('required-war-interval')
                ],
                [
                    'requirement' => GuildRequirement::Quest,
                    'quantity' => $request->get('required-quest-quantity'),
                    'interval' => $request->get('required-quest-interval')
                ],
                [
                    'requirement' => GuildRequirement::GearScore,
                    'quantity' => $request->get('required-gear-score'),
                    'interval' => $request->get('required-gear-offhand')
                ],
            ]
        ]);

        if ($request->hasFile('logo')) {
            $guild->logo = $request->file('logo')->storeAs('logos', $request->file('logo')->getClientOriginalName());
            $guild->save();
        }

        Auth::user()->guild_uuid = $guild->uuid;
        Auth::user()->save();

        return response()->redirectTo("guilds");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->view('guilds.view', ['guild' => Guild::whereUuid($id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->view('guilds.edit', ['guild' => Guild::whereUuid($id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
