<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class ProfileController extends Controller
{
    /**
     * @return void
     */
    public function show($id){
        session()->put('user_id', $id);
        $user = User::find($id);


        return view('front.profile', compact('user'));
    }


    public static function store(ProfileRequest $request){
        $validatedData = $request->validated();

        if ($validatedData['image']) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }

        User::create($validatedData);

        return to_route('userDashboard')->with('success', 'Login successful');

    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

}
