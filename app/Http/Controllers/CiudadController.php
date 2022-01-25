<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CiudadController extends Controller
{
    public function buscar(Request $request)
    {
        /* $input = $request->all(); */

        $request->validate([
            'ciudad' => 'required'

        ]);
      
        $usuarios = HTTP::get('http://api.openweathermap.org/data/2.5/weather?q='.$request->ciudad.'&lang=es&APPID=e057c0c89304e42af8e6d1d0dbe43dcc');
       /* $en = HTTP::get('http://api.openweathermap.org/data/2.5/weather?q='.$request->ciudad.'&lang=en&APPID=e057c0c89304e42af8e6d1d0dbe43dcc');
        $enArray  =  $en->json(); */
        $usArray =  $usuarios->json();
       
      

        return view('welcome',compact('usArray')); 
    }
}
