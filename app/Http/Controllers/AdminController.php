<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use App\Models\Kain;

class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
    }

    public function add_category(Request $request)
    {
        // $data->name=$request=$request->name;
        // $data->detail=$request=$request->detail;
        // $data->price_low=$request=$request->low_price;
        // $data->price_high=$request=$request->high_price;
        
        $request->validate([
            'name' => ['required', 'string'],
            'detail' => ['required'],
            'price_low' => ['required'],
            'price_high' => ['required']
        ]);

        $data->name=$request=$request->name;
        $data->detail=$request=$request->detail;
        $data->price_low=$request=$request->low_price;
        $data->price_high=$request=$request->high_price;

        $request->save();

        return redirect()->back();
    }

    public function showCreateUserForm()
    {
        //memastikan user
        $user = Session::get('user');

        if($user['data']['level'] != '2')
        {
            return redirect('/');
        }
        
        return view('admin.createUser');
    }

    public function createUser(Request $request)
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
        
        $user = Session::get('user');
        $token = $user['token'];
        $userLevel = $user['data']['level']; // Retrieve the user level from the session
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->post('http://127.0.0.1:8000/app/user/'.$userLevel.'/', $data);

        // Check the response status code to handle success or failure
        if ($response->successful()) {
            // return a view if successful
            return redirect('/Users')->with('pesan', 'User has been created successfully!');
        } 

        else {
            // Request failed, handle the error
            $statusCode = $response->status();
            $errorMessage = $response->body();
            return view('auth.login')->with('pesan', 'Failed creating user');
        }
    }

    public function showEditUserForm(Request $request)
    {
        //dapat data pada variabel $data
        $data = json_decode($request->query('data'), true);
        //memastikan user
        $user = Session::get('user');

        if($user['data']['level'] != '2')
        {
            return redirect('/')->with('pesan', 'You are not allowed to do this!');
        }
        
        return view('admin.editUser')->with('data',$data);;
    }

    public function editUser(Request $request)
    {
        //dapat data pada variabel $data
        $data = json_decode($request->input('data'), true);
        $userID = $data['pk']; // Retrieve the user ID from the user data

        $user = Session::get('user');
        $token = $user['token'];

        //validasi data yang akan disimpan pada database
        $request->validate([
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|min:3|max:100',
            'address' => 'required|string|max:255',
            'password' => 'confirmed',
        ]);

        // set the data to send in the request body
        $data = array(
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password,
        );

        // Remove empty fields from the data
        $data = array_filter($data);
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->patch('http://127.0.0.1:8000/app/user/profile/'.$userID.'/', $data);
        
        if ($response->successful()) {
            //save data retrieved into $data
            $responseData = $response->json(); 

            // return a view if successful
            return redirect('/Users')->with('pesan', 'User data has been updated successfully!');
        } 

        else {
            // Request failed, handle the error
            $statusCode = $response->status();
            $errorMessage = $response->body();
            return redirect()->back()->with('error', 'Failed updating user');
        }
    }

    public function deleteUser(Request $request)
    {
        //dapat data pada variabel $data
        $data = json_decode($request->input('data'), true);
        
        $user = Session::get('user');
        $token = $user['token'];
        $userID = $data['pk']; // Retrieve the user ID from the data
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->delete('http://127.0.0.1:8000/app/user/profile/'.$userID.'/', $data);

        // Check the response status code to handle success or failure
        if ($response->successful()) {
            // return a view if successful
            return redirect()->back()->with('pesan', 'User has been deleted successfully!');
        } 

        else {
            // Request failed, handle the error
            $statusCode = $response->status();
            $errorMessage = $response->body();
            return redirect()->back()->withInput()->with('error', 'Failed deleting user');
        }

    }
}
