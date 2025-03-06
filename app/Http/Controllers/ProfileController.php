<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'phone' => $validatedData['phone'],
            'image' => $imagePath,
            'account_id' => session('id'),
            ]);

        return to_route('userDashboard')->with('success', 'Login successful');

    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function savingStore(Request $request)
    {

        $save = User::findOrFail(session('user_id'));
        if($save->balance < 0){
            $save->saved += $request['saved'];
            $save->balence -= $request['saved'];
            $save->save();

            return back();
        }
        else{
            return back()->with('error', 'You have no money to save');
        }

    }
}
