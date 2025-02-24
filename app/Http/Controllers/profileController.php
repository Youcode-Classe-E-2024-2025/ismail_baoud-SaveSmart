<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class profileController extends Controller
{
    /**
     * @return void
     */
    public function index($id){
        $user = User::find($id)->join('accounts', 'accounts.id', '=', 'users.account_id')->select('users.*', 'accounts.email')->first();

        return view('front.profile', compact('user'));
        }


}
