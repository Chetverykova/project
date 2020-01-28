<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

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
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)->with('note')->get();

        return view('home', ['transactions' => $transactions]);
    }

    public function adminHome(Request $request)
    {
        $user = auth()->user();
        $transactions = Transaction::with('note', 'user')->get();

        return view('adminHome', ['transactions' => $transactions]);
    }

    public function searchTransaction(Request $request)
    {
        
    }
}
