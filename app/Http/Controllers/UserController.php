<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 *
 */
class UserController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|object
     */
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/adminDashboard');
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|object
     */
    public function editUser(Request $request , $id){

        $request = $request->validate([
            'firsName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:8',
        ]);
        $user = User::find($id);
        $user->update($request);
        return redirect('/profile');
    }
}
