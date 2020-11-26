<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorariosController extends Controller
{
    public function registrarHorario(){
            return back()->with('message','You added new items, follow next step!');
    }
}
