<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $email = Auth::user()->email;

        $categories = Category::where('user_email', $email)->get();
        $transactions = Transaction::where('user_email', $email)->get();

        $total = 0;
        foreach ($transactions as $transaction){
            if ($transaction->type === 'Доход')
                $total += $transaction->amount;
            if ($transaction->type === 'Расход')
                $total -= $transaction->amount;
        }

        $start_date = Transaction::where('user_email', $email)->pluck('create_date')->min();
        $end_date = Transaction::where('user_email', $email)->pluck('create_date')->max();

        $filter = 'NO';
        return view('transaction.index', compact('transactions', 'categories', 'filter', 'total', 'start_date', 'end_date'));
    }

    public function filter(TransactionRequest $req) {
        $email = Auth::user()->email;
        $categories = Category::where('user_email', $email)->get();

        $transactions = Transaction::where('user_email', '=', $email)
            ->whereBetween('create_date', [$req->start_date, $req->end_date])->get();

        $total = 0;
        foreach ($transactions as $transaction){
            if ($transaction->type === 'Доход')
                $total += $transaction->amount;
            if ($transaction->type === 'Расход')
                $total -= $transaction->amount;
        }

        $start_date = $req->start_date;
        $end_date = $req->end_date;
        $filter = 'YES';
        return view('transaction.index', compact('transactions', 'categories', 'filter', 'total', 'req', 'start_date', 'end_date'));
    }


    public function create(TransactionRequest $req) {
        $email = Auth::user()->email;
        $categories = Category::where('user_email', $email)->get();
        if ($categories->isEmpty()) die('Need to create a Category');

        $transaction = new Transaction();
        $email = Auth::user()->email;

        $type = $req->input('type');
        $max_total = Transaction::where('user_email', $email)->pluck('total')->last();

        if ($type === 'Доход')
            $transaction->total = $max_total + $req->input('amount');

        if ($type === 'Расход')
            $transaction->total = $max_total - $req->input('amount');

        $transaction->type = $type;
        $transaction->category = $req->input('category');
        $transaction->create_date = $req->input('create_date');
        $transaction->amount = $req->input('amount');
        $transaction->comments = $req->input('comments');
        $transaction->user_email = $email;

        $transaction->save();

        return redirect()->route('transaction-index');
    }

    public function destroy($id) {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->route('transaction-index');
    }

    public function edit(Transaction $transaction) {
        $email = Auth::user()->email;
        $categories = Category::where('user_email', $email)->get();

        return view('transaction.edit', compact('transaction', 'categories'));
    }

    public function update(TransactionRequest $req, Transaction $transaction) {
        $transaction->
        update([
            'type' => $req->type,
            'category' => $req->category,
            'create_date' => $req->create_date,
            'amount' => $req->amount,
            'total' => $req->amount,
            'comments' => $req->comments
        ]);
        return redirect()->route('transaction-index');
    }


}
