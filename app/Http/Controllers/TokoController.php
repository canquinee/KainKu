<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TokoController extends Controller
{
    public function TokoList()
    {
        $user = Session::get('user');
        $token = $user['token'];
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->get('http://127.0.0.1:8000/app/toko/');
        
        if ($response->successful()) {
            //save data retrieved into $data
            $data = $response->json();
            
            //pergi ke page yg menunjukkan list toko
            return view('admin.Toko-List')->with('data', $data);

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }
    }
}
