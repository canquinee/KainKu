<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Kain;

class HomeController extends Controller
{
    /*template html nya*/ 

    public function index()
    {
        return view('home.homepage');
    }

    public function adminPage()
    {
        $user = Session::get('user');

        if(!$user)
        {
            return redirect('/');
        }

        return view('admin.home');
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }

        else
        {
            return view('home.homepage');
        }
    }

    public function showKain()
    {
        $user = Session::get('user');
        $token = $user['token'];
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->get('http://127.0.0.1:8000/app/kain/');
        
        if ($response->successful()) {
            //save data retrieved into $data
            $data = $response->json();
            
            //pergi ke page yg menunjukkan list kain
            return view('home.kainList')->with('data', $data);

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }
    }
}
