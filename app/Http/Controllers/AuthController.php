<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function index()
  {
    return view('auth.login.index');
  }

  public function loginProses(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'no_sim' => 'required',
      'password' => [
        'required',
        'string',
        'min:8',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
      ]
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $credentials = [
      'no_sim' => $request->nik,
      'password' => $request->password,
    ];

    $user = User::where('no_sim', $credentials['no_sim'])->first();
    if (Auth::attempt($credentials)) {
      if ($user->role == 'admin') {
        return redirect()->intended('/dashboard');
      } elseif ($user->role == 'user') {
        return redirect()->intended('/');
      }
    }
  }

  public function register() {
    return view('auth.register.index');
  }

  public function registerProses(Request $request) {
    $validator = Validator::make($request->all(), [
      'no_sim' => 'required|unique:users',
      'nama' => 'required',
      'no_telp' => 'required',
      'alamat' => 'required',
      'password' => [
        'required',
        'string',
        'min:8',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
      ]
    ]);

    if ($validator->fails()) {
      return redirect('/register')
        ->withErrors($validator)
        ->withInput();
    }

    User::create([
      'no_sim' => $request->input('no_sim'),
      'nama' => $request->input('nama'),
      'alamat' => $request->input('alamat'),
      'no_telp' => $request->input('no_telp'),
      'password' => Hash::make($request->input('password')),
    ]);

    Session::flash('success', 'Akun berhasil dibuat. Silakan login');

    return redirect('/login');
  }
}
