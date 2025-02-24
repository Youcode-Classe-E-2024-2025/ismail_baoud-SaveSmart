<?php

namespace  App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Storage;

/**
 *
 */
class authController extends Controller{

    /**
     * @return void
     */
    public function signup(){
        return view('auth.signup');
    }

    /**
     * @return void
     */
    public function signin(){
        return view('auth.signin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firsName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|min:6',
            'image' => 'required|image',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }


        User::create([
            'firsName' => $validatedData['firsName'], // Correction du champ
            'lastName' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'] ?? null,
            'password' => Hash::make($validatedData['password']),
            'role' => 'user',
            'image' => $imagePath, // Enregistrer le chemin de l'image
        ]);

        return redirect()->route('signin')->with('success', 'Account created successfully');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginStore(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $request->session()->put('user', $user);
            $request->session()->put('role', $user->role);
            $request->session()->put('id', $user->id);
            return redirect()->route('home')->with('success', 'Login successful');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    /**
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|object
     */
    public function logout(){
            Session::flush();
            auth()->logout();
            return redirect('/signin');
    }


}
