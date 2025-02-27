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
        session()->put('user_id', $id);
        $user = User::find($id);



        return view('front.profile', compact('user'));
        }

        public static function store(Request $request){
            $validatedData = $request->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'phone' => 'required',
                'image' => 'required',
            ]);
            if ($validatedData['image']) {
                $imagePath = $request->file('image')->store('profile_images', 'public');
            } else {
                $imagePath = null;
            }
            User::create([
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
                'account_id' => session('id'),
                'phone' => $validatedData['phone'] ?? null,
                'image' => $imagePath,
            ]);

            return redirect()->route('userDashboard')->with('success', 'Login successful');

        }


}
