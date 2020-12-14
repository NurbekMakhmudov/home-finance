<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\Home;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $email = Auth::user()->email;
        $transactions = Transaction::where('user_email', $email)->get();

        /*   Не закончен

        // Get users grouped by age
        $groups = DB::table('transaction')
            ->select('amount', DB::raw('count(*) as id'))
            ->groupBy('id')
            ->pluck('amount')->all();
        // Generate random colours for the groups
        for ($i=0; $i<=count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        // Prepare the data for returning with the view
        $transactions = new Transaction();
        $transactions->labels = (array_keys($groups));
        $transactions->dataset = (array_values($groups));
        $transactions->colours = $colours;
        */

        return view('home.index', compact('transactions'));
    }


}
