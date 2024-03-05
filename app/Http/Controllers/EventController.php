<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
     function index(){

       // $events = Event::all();
    
        return view('rota');
    }

    function create(){
        return view('event.create');
    }
}
