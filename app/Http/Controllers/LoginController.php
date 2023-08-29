<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //show login page or form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        $response = Http::post('http://127.0.0.1:8000/app/user/login/', $credentials);
        
        if ($response->successful()) {
            // Authentication successful, perform any additional actions if needed
            // ngambil data dari backend
            $data = $response ->json();
            $level = $response['data']['level'];
            Session::put('user', $data);

            //kembali ke page dashboard jika level user admin atau super admin
            if ($level == '1' || $level == '2'){
                return redirect('/dashboard')->with('data',$data)->with('pesan', 'Login Successful, Welcome to admin dashboard! ^.^');
            }
            //kembali ke halaman utama jika level user biasa
            elseif ($level == '0'){
               return redirect('/')->with('pesan', 'Login Successful'); 
            }
        } else {
            // Authentication failed, redirect back to the login form with an error message
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials'])->with('error', 'Username/Password Invalid');
        }
    }

    public function logout()
    {
        $user = Session::get('user');
        $token = $user['token'];
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->post('http://127.0.0.1:8000/app/user/logout/');
        
        if ($response->successful()) {
            // hapus session di laravel
            Session::flush();

            //kembali ke page dashboard setelah logout
            return redirect('/')->with('pesan', 'Logout berhasil, sampai jumpa kembali'); 

        } else {
            // Authentication failed, redirect back to the login form with an error message
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials'])->with('error', 'Username/Password Invalid');
        }
    }

    public function showRegisterForm()
    {
        //memastikan user
        $user = Session::get('user');

        if($user)
        {
            return redirect('/');
        }
        
        return view('auth.register');
    }

    public function register(Request $request)
    {
        //validasi data yang akan disimpan pada database
        $request->validate([
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|min:3|max:100',
            'address' => 'required|string|max:255',
            'password' => 'required|min:8|max:16|confirmed',
        ]);

        // set the data to send in the request body
        $data = array(
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'address' => $request->address
        );
        
        $response = Http::post('http://127.0.0.1:8000/app/user/create/', $data);

        // Check the response status code to handle success or failure
        if ($response->successful()) {
            // Request succeeded, handle the response as needed
            $responseData = $response->json();
            // Process the response data
            Session::put('user', $responseData);
            // return a view if successful
            return redirect('/')->with('pesan', 'Registration Successful');
        } 

        else {
            // Request failed, handle the error
            $statusCode = $response->status();
            $errorMessage = $response->body();
            return view('auth.login')->with('pesan', 'Registration Failed');
        }

    }
}