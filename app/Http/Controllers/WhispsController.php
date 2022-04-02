<?php

namespace App\Http\Controllers;

use App\Models\Whisp;
use Illuminate\Http\Request;

class WhispsController extends Controller
{
    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255']);
        Whisp::create([
            'user_id' =>auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect()->route('home');
    }

    public function index()
    {
        return view('whisps.index',[
            'whisps' => auth()->user()->timeline()
        ]);
    }
}
