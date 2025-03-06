<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\User;

/**
 *
 */
class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public static function store(TransactionRequest $request)
    {

        $validatedData = $request->validated();
        $user_id = session('user_id') ;
        $account_id = session('id') ;

        Transaction::create([
            'description'=>$validatedData['description'],
            'amount'=>$validatedData['amount'],
            'type'=>$validatedData['type'],
            'status'=>$validatedData['status'],
            'category_id'=>$validatedData['category'],
            'user_id'=>$user_id,
            'account_id'=>$account_id,
        ]);
        if($request['type'] === 'depense'){
            User::where('id', $user_id)->decrement('balence', $validatedData['amount']);

        }elseif($request['type'] === 'revenu'){
            User::where('id', $user_id)->increment('balence', $validatedData['amount']);

        }else{
            return back();
        }

        return to_route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request)
    {
        $validatedData = $request->validated();
        $transaction = Transaction::findOrFail($request['transaction_id']);

        $transaction->amount = $validatedData['amount'];
        $transaction->category_id = $request['category'];
        $transaction->description =$validatedData['description'];

        $transaction->save();
        return redirect()->back()->with('success', 'transaction deleted successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->delete();
        return redirect()->back()->with('success', 'transaction deleted successfully!');
    }
}
