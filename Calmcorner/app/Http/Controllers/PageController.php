<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function layout()
    {
        return view('layout');
    }
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function information()
    {
        return view('information');
    }

    public function contactus()
    {
        return view('contactus');
    }

    public function login()
    {
        return view('login');
    }

    

    public function blog()
    {
        return view('blog');
    }

    public function register()
    {
        return view('register');
    }

    public function support()
    {
        return view('support');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
    
            
        return back()->with('success', 'Your message has been sent!');
    }
   




        public function submitlogin(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ])) {
            return redirect()->intended('home'); // Redirect after successful login
        }

        // If authentication fails
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }
        // Process the form submission (e.g., send an email, save to the database)



        public function submitregister(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user using Eloquent
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect or return a response
        return redirect()->route('register')->with('success', 'User registered successfully!');
    }

    
public function getAjaxData()
{
    $data = ['message' => 'Hello, this is AJAX data!'];
    return response()->json($data);
}

    
}
