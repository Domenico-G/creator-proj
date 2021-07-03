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
        $states = State::all();
        return view('admin.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $this->dataValidator($request);

        $request->validate([
            'image' => 'required'
        ]);

        $data = $request->all();
        $stateName = $data['state_name'];

        // Salvo la rotta per l'immaigne
        $path = $request->file('image')->store('public');

        $creator = new Creator;
        $creator->fill($data);
        $creator->image = $path;
        $creator->save();

        // Salvo lo stato del creator
        $creator->state()->attach($stateName);

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
       dd('ciao');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Creator $creator
     * @return \Illuminate\Http\Response
     */
    public function edit(Creator $creator)
    {
        $states = State::all();
        return view('admin.edit', compact('creator', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Creator $creator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Creator $creator)
    {
        // Validazione dei dati
        $this->dataValidator($request);

        $data = $request->all();
       // dd($data);
        $stateName = $data['state_name'];

        // Salvo la rotta per l'immaigne
        if ($request->file('image') === null) {
            $path = $creator->image;
        } else {
            $path = $request->file('image')->store('public');
        }

        $creator->image = $path;
        $creator->update($data);

        // Salvo lo stato del creator
        $creator->state()->sync($stateName);

        return redirect()->route('guest.show', ['name' => $creator->name]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Creator $creator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creator $creator)
    {
        $creator->state()->detach();
        $creator->delete();

        return redirect()->route('admin.index');
    }


    public function dataValidator(Request $request) {

        $request->validate([
            "name" => 'required',
            "subtitle" => 'required',
            "description" => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "visible" => 'required|boolean',
            "state_name" => 'required',
        ]);

    }
}
