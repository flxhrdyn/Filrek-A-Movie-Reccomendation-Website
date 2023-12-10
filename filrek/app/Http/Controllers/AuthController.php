<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function startSignUp(Request $req, User $data)
    {
        $d = $req->validate([
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required'
        ]);
        $data->create($d);
        return redirect(route('signUp'))->with('msg', 'Successfully registered!');
    }

    public function signUp()
    {
        return view('signUp');
    }

    public function startSignIn(Request $req)
    {
        $d = $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($d)) {
            $user = DB::select('select * from users where username = ?', [$req->username]);
            Session::put('dataUser', $user);
            return redirect(route('view.home'));
        } else {
            return redirect(route('signIn'))->with('msg', 'Username or password do not match!');
        }
    }

    public function signIn()
    {
        return view('signIn');
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('datauser');
        return redirect(route('signIn'));
    }

    public function home()
    {
        return view('home', ['user' => userSession()]);
    }

    public function search(Request $req)
    {
        $d = $req->validate([
            'search' => 'required',
        ]);

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://movies-api14.p.rapidapi.com/search?query=' . urlencode($d['search']), [
            'headers' => [
                'X-RapidAPI-Host' => 'movies-api14.p.rapidapi.com',
                'X-RapidAPI-Key' => 'd91b653bf5msh3f4015081804291p130953jsn97c931c5531e',
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        return view('result', ['user' => userSession(), 'result' => $result]);
    }

    public function trending()
    {
        return view('trending', ['user' => userSession()]);
    }

    public function editAccount()
    {
        return view('editAccount', ['user' => userSession()]);
    }

    public function updateAccount(Request $req)
    {
        $d = $req->validate([
            'username' => 'required|unique:users,username',
        ]);
        DB::update('update users set username = ? where username = ?', [$d['username'], $req->oldUsername]);
        return redirect(route('view.editAccount'))->with('msg', 'Username changed successfully!');
    }

    public function deleteAccount()
    {
        return view('deleteAccount', ['user' => userSession()]);
    }

    public function startDeleteAccount(Request $req)
    {
        $d = $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $d['username'])->first();

        if (!$user) {
            return redirect(route('view.deleteAccount'))->with('error', 'Username not found.');
        }

        if (!password_verify($d['password'], $user->password)) {
            return redirect(route('view.deleteAccount'))->with('error', 'Incorrect password.');
        }

        $user->delete();

        Auth::logout();
        Session::forget('dataUser');

        return redirect(route('signIn'))->with('msg', 'Account deleted successfully.');
    }
}

function userSession()
{
    return Session::get('dataUser');
}
