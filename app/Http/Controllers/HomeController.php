<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $email = Auth::user()->email;
        $transactions = Transaction::where('user_email', $email)->get();

        return view('home.index', compact('transactions'));
    }


}
