<?php

namespace App\Http\Controllers;
use App\Dto\booksDTO;
use App\Dto\profilesDTO;
use App\Models\Account;
use App\Models\book;
use App\Models\User;
use Illuminate\Http\Request;

/**
 *
 */
class dashboardController extends Controller
{
    /**
     * @return void
     */

    public function index(){
        $users = User::all()->map(fn($a) =>new profilesDTO(
            $a->id,
            $a->firstName . ' ' . $a->lastName,
            $a->image,
            $a->created_at,
        ))->where('id', session('id'));

        return view('front.home')->with('profiles', $users);

    }

    /**
     * @return void
     */
    public function userDashboard($id){
        $id = User::find($id);
        return view('front.dashboard')->with('id', $id);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function adminDashboard(){
        $users =   User::all();
        return view('back.dashboard')->with('users', $users);
    }

}
