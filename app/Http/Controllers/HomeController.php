<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::whereNotNull('schedule')->get();

        $data = [];
        $data['events'] = $events;
        return view('home', $data);
    }

    
    public function hola()
    {
        return view('hola.hola');
    }

}
