<?php

namespace App\Http\Controllers\Admin;

use App\Creator;
use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creators = Creator::all();
        return view('admin.dashboard', compact('creators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $stateName = $data['state_name'];


        $state = new State;
        $state->state_name = $stateName;
        $state->save();

        // Recupero lo stato del creator appena creato dalla tabella
        $idLastState = State::orderBy('id', 'DESC')->first();

        // Salvo la rotta per l'immaigne
        $path = $request->file('image')->store('public');

        $creator = new Creator;
        $creator->fill($data);
        $creator->state_id = $idLastState->id;
        $creator->image = $path;
        $creator->save();

        return redirect()->route('guest.show', ['name' => $creator->name]);

    }

    /**
     * Display the specified resource.
     *
     * @param  String  $name
     * @return \Illuminate\Http\Response
     */
    public function show(String $name)
    {
        $creator = Creator::select()->where('name', $name)->first();
        return view('show', compact('creator'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Creator $creator
     * @return \Illuminate\Http\Response
     */
    public function edit(Creator $creator)
    {
        return view('admin.edit', compact('creator'));
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
     * @param  Creator $creator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creator $creator)
    {
        $creator->delete();
        $creator->state->delete();

        return redirect()->route('admin.index');
    }


    public function dataValidator(Request $request) {

        $request->validate([
        //   inserire dati da validare
        ]);

    }
}
