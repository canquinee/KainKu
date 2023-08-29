<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function SuperAdminList()
    {
        $user = Session::get('user');
        $token = $user['token'];
        $userLevel = $user['data']['level']; // Retrieve the user level from the session
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->get('http://127.0.0.1:8000/app/user/'.$userLevel.'/');
        
        if ($response->successful()) {
            //save data retrieved into $data
            $data = $response->json();
            // Filter the data based on your criteria
            $filteredData = collect($data)->filter(function ($item) {
                // Replace 'column' with the actual column name and 'value' with the desired value
                return $item['level'] === '2';
            });

            //pergi ke page yg menunjukkan list user dengan data yg sudah difilter level khusus 2
            return view('admin.SA-List')->with('data', $filteredData);

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }
    }

    public function AdminList()
    {
        $user = Session::get('user');
        $token = $user['token'];
        $userLevel = $user['data']['level']; // Retrieve the user level from the session
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->get('http://127.0.0.1:8000/app/user/'.$userLevel.'/');
        
        if ($response->successful()) {
            //save data retrieved into $data
            $data = $response->json();
            // Filter the data based on your criteria
            $filteredData = collect($data)->filter(function ($item) {
                // Replace 'column' with the actual column name and 'value' with the desired value
                return $item['level'] === '1';
            });

            //pergi ke page yg menunjukkan list user dengan data yg sudah difilter level khusus 1
            return view('admin.A-List')->with('data', $filteredData);

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }
    }

    public function UserList()
    {
        $user = Session::get('user');
        $token = $user['token'];
        $userLevel = $user['data']['level']; // Retrieve the user level from the session
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->get('http://127.0.0.1:8000/app/user/'.$userLevel.'/');
        
        if ($response->successful()) {
            //save data retrieved into $data
            $data = $response->json();
            // Filter the data based on your criteria
            $filteredData = collect($data)->filter(function ($item) {
                return $item['level'] === '0';
            });

            //pergi ke page yg menunjukkan list user dengan data yg sudah difilter level khusus 2
            return view('admin.U-List')->with('data', $filteredData);

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }
    }

    public function showProfile()
    {
        $user = Session::get('user');
        $token = $user['token'];
        $userID = $user['data']['pk']; // Retrieve the user level from the session
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->get('http://127.0.0.1:8000/app/user/profile/'.$userID.'/');
        
        if ($response->successful()) {
            //save data retrieved into $data
            $data = $response->json();
            //pergi ke page yg menunjukkan data profile user
            return view('home.userPersonalData')->with('data',$data)->with('pesan', 'Welcome, This is your profile page! ^.^');

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }  
    }

    public function showEditProfileForm(Request $request)
    {
        //dapat data pada variabel $data
        $data = json_decode($request->query('data'), true);
        
        return view('home.editPersonalDataForm')->with('data',$data);
    }

    public function editProfile(Request $request)
    {
        $user = Session::get('user');
        $token = $user['token'];
        $userID = $user['data']['pk']; // Retrieve the user ID from the session

        //validasi data yang akan disimpan pada database
        $request->validate([
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|min:3|max:100',
            'address' => 'required|string|max:255',
        ]);

        // set the data to send in the request body
        $data = array(
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address
        );

        // Remove empty fields from the data
        $data = array_filter($data);
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->patch('http://127.0.0.1:8000/app/user/profile/'.$userID.'/', $data);
        
        if ($response->successful()) {
            //save data retrieved into $data
            $responseData = $response->json();

            //pergi ke page yg menunjukkan data profile user
            return view('home.userPersonalData')->with('data',$responseData)->with('pesan', 'Changes has been implemented! ^.^');

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }  
    }

    public function showEditPasswordForm(Request $request)
    {
        //dapat data pada variabel $data
        $data = json_decode($request->query('data'), true);
        
        return view('home.editPasswordForm')->with('data',$data);
    }

    public function editProfilePassword(Request $request)
    {
        $user = Session::get('user');
        $token = $user['token'];
        $userID = $user['data']['pk']; // Retrieve the user level from the session

        //validasi data yang akan disimpan pada database
        $request->validate([
            'password' => 'required|min:8|max:16|confirmed',
        ]);

        // set the data to send in the request body
        $data = array(
            'password' => $request->password
        );
        
        $response = Http::withHeaders(['Authorization' => 'Token ' . $token,])->patch('http://127.0.0.1:8000/app/user/profile/'.$userID.'/', $data);
        
        if ($response->successful()) {
            //save data retrieved into $data
            $responseData = $response->json();
            //pergi ke page yg menunjukkan list user dengan data yg sudah difilter level khusus 2
            return view('home.userPersonalData')->with('data',$responseData)->with('pesan', 'Welcome, This is your profile page! ^.^');

        } else {
            // Authentication failed, redirect back to the dashboard page with an error message
            return redirect()->back()->withInput()->with('error', 'Data Invalid');
        }  
    }
}
