<?php

namespace App\Http\Controllers;
use App\Dto\booksDTO;
use App\Dto\profilesDTO;
use App\Models\Account;
use App\Models\book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class DashboardController extends Controller
{
    /**
     * @return void
     */

    public function showHome(){
        $id = session('id');



        //categories
        $categories = Category::all()->where('account_id','=',$id);

        //Transactions
        $transactions = Transaction::with(['category', 'user'])
            ->where('account_id', $id)
            ->whereNull('deleted_at')
            ->get();



        return view('front.home')->with(['categories'=>$categories, 'transactions'=>$transactions]);


    }

    /**
     * @return void
     */
    public function showUserDashboard(){

        session()->forget('user_id');
        $id = session('id');
        $users = User::all()->where('account_id', '=',$id )->map(fn($a) => new profilesDTO(
            $a->id,
            $a->firstName . ' ' . $a->lastName,
            $a->image,
            $a->created_at,
        ));
        return view('front.dashboard')->with('profiles', $users);
    }

}
