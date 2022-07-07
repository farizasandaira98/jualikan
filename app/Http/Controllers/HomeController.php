<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokIkan;

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
        $ikan = StokIkan::all()->take(3);
        return view('welcome')
        ->with(compact('ikan'));
    }
}
