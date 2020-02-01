<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Spatie\Searchable\Search;
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
//        $searched_data = Transaction::where('name', 'LIKE', "%" . $request->input('search_transaction') . "%")->get();
//
//        return view('catalog.index', compact('events'));

//        $query = User::query();
//        $query->when(request('role', false), function ($q, $role) {
//            return $q->where('role_id', $role);
//        });
//        $authors = $query->get();

//        $searched_data = Transaction::with('note', 'user')
//            ->where('amount', 'LIKE', "%" . $request->input('search_transaction') . "%")
//            ->where('user.name', 'LIKE', "%" . $request->input('search_transaction') . "%")
//            ->get();

        $searchResults = (new Search())
            ->registerModel(Transaction::class, 'amount')
//            ->registerModel(User::class, 'name')
            ->perform($request->input('search_transaction'));

        return response()->json($searchResults);
    }
}
