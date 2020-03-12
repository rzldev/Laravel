<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        // $request->session()->put(['rzldev'=>'Administrator']);
        // return $request->session()->all();

        // $request->session()->forget('rzldev');
        // return $request->session()->all();

        // $request->session()->flush();
        // return $request->session()->all();

        // $request->session()->flash('message', 'Post has been created.');
        // return $request->session()->get('message');

        // $request->session()->reflash();

        // $request->session()->keep('message');

        return view('home');
    }
}
