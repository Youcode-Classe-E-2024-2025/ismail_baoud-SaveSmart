<?php

namespace  App\Http\Controllers;

use App\Models\Account;
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
            'email' => 'required|string|email|max:255|unique:accounts',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:20',
            'image' => 'required|image',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }

        Account::create([
            'name' => 'ait' . ' ' . $validatedData['lastName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $lastRecord = Account::latest()->first();

        User::create([
            'firstName' => $validatedData['firsName'],
            'lastName' => $validatedData['lastName'],
            'account_id' => $lastRecord->id,
            'phone' => $validatedData['phone'] ?? null,
            'image' => $imagePath,
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
        $account = Account::where('email', $request->email)->first();


        if ($account && Hash::check($request->password, $account->password)) {
            $request->session()->regenerate();


            $request->session()->put('user', $account);
            $request->session()->put('id', $account->id);
            return redirect()->route('userDashboard')->with('success', 'Login successful');
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
