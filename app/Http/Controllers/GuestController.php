<?php

namespace App\Http\Controllers;

use App\Creator;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        $creators = Creator::all();
        return view('home', compact('creators'));
    }

    public function show(String $name) {
        $creator = Creator::select()->where('name', $name)->first();
        return view('show', compact('creator'));
    }
}
