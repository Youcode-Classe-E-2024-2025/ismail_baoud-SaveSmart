<?php

namespace App\Http\Controllers;
use App\Dto\booksDTO;
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
//        $books = book::all()->map(fn($a) =>new booksDTO(
//            $a->id,
//            $a->title,
//            $a->author,
//            $a->image,
//            $a->description,
//            $a->price,
//            $a->created_at,
//            $a->status
//        ));

        return view('front.home');

    }

    /**
     * @return void
     */
    public function userDashboard(){
        $user = User::find(session('id'));
        $books = $user->reservedBooks;
        return view('front.dashboard')->with('books', $books);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function adminDashboard(){
        $users =   User::all();
        return view('back.dashboard')->with('users', $users);
    }

}
