<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    public function __invoke()
    {
        
        $usuarios = HTTP::get('http://api.openweathermap.org/data/2.5/weather?q=arica&lang=es&APPID=e057c0c89304e42af8e6d1d0dbe43dcc');
        $usArray =  $usuarios->json();

       

        return view('welcome',compact('usArray'));
    }
   
}
