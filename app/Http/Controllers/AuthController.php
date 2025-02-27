<?php

namespace  App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/**
 *
 */
class authController extends Controller{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function showRegisterForm(){
        return view('auth.signup');
    }


    /**
     * @param SignupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(SignupRequest $request)
    {
        // here i validate all data using the request form validate (signup request)
        $validatedData = $request->validated();

        //here i upload the img in storage but i send in the database just the path start in profile_images/.....png        if ($request->hasFile('image')) {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }


    // new i separate this data i send the name of family and email and password to the account table
        Account::create([
            'name' => 'ait' . ' ' . $validatedData['lastName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $lastRecord = Account::latest()->first();

        //here i stock the user data in the users table (profile)
        User::create([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'account_id' => $lastRecord->id,
            'phone' => $validatedData['phone'] ?? null,
            'image' => $imagePath,
        ]);
         //after register i redirect user to the login page for login with success message
        return redirect()->route('showLoginForm')->with('success', 'Account created successfully');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function showLoginForm(){
        //here i return login page
        return view('auth.signin');
    }


    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request){
        // validate data
        $credentials = $request->validated();
        //get the first user who have this email becous i have email unique so we don't need to search after find the first one
        $account = Account::where('email', $credentials['email'])->first();

        //compare the password of user with the hash password of user in $account variable
        if ($account && Hash::check($credentials['password'], $account->password)) {
            $request->session()->regenerate();

            //stock all user data in session and also the user id separate for use it
            $request->session()->put('user', $account);
            $request->session()->put('id', $account->id);
            //return user to the dashboard if login is done
            return redirect()->route('userDashboard')->with('success', 'Login successful');
        }
        //if login infos not correct redirect the user to the briveus page with here email in the input
        return back()->withErrors([
                                    'email' => 'The provided credentials do not match our records.',
                                    ])->onlyInput('email');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        // do logout from account and remove session
            Session::flush();
            auth()->logout();
            return to_route('login');
    }


}
