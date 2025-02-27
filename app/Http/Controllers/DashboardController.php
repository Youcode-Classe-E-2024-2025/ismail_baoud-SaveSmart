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
class dashboardController extends Controller
{
    /**
     * @return void
     */

    public function index(){
        $id = session('id');

        //categories
        $categories = Category::all()->where('account_id','=',$id);

        //Transactions
        $transactions = Transaction::with(['category', 'user'])
            ->where('account_id', $id)
            ->whereNull('deleted_at')
            ->get();


//     return $transactions->category->name;

        return view('front.home')->with(['categories'=>$categories, 'transactions'=>$transactions]);


    }

    /**
     * @return void
     */
    public function userDashboard(){

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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function adminDashboard(){
        $users =   User::all();
        return view('back.dashboard')->with('users', $users);
    }

}
