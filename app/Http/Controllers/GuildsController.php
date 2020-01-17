<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guild = Guild::create([
            'owner_id' => Auth::user()->id,
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'logo' => $request->file('logo')->storeAs('logos', $request->file('logo')->getClientOriginalName()),
            'description' => $request->get('description'),
            'requirements' => [
                [
                    'requirement' => 'Node War',
                    'quantity' => $request->get('request-war-quantity'),
                    'interval' => $request->get('request-war-interval')
                ],
                [
                    'requirement' => 'Quests',
                    'quantity' => $request->get('request-quest-quantity'),
                    'interval' => $request->get('request-quest-interval')
                ],
                [
                    'requirement' => 'Gear Score',
                    'quantity' => $request->get('request-war-quantity'),
                    'interval' => $request->get('request-war-interval')
                ],
            ]
        ]);
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
        return response()->view('guilds.view', ['guild' => Guild::whereUuid($id)->get()]);
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
