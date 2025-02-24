<?php

namespace App\Http\Controllers;

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
    public function index(){
        $user = Auth::user();

        return view('front.profile', compact('user'));
        }


}
