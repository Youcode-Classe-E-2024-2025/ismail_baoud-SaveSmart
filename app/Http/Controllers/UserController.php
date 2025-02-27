<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

/**
 *
 */
class UserController extends Controller
{
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|object
     */
    public function update(UserRequest $request , $id){
        $request = $request->validated();
        $user = User::find($id);

        $user->update($request);
        return redirect('/profile/'. $id);
    }
    /**
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|object
     */
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/adminDashboard');
    }
}
