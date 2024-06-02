<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return redirect('/xyz/home');
            } else if (Auth::user()->role == 2) {
                return redirect('/xyz-1/home');
            } else if (Auth::user()->role == 3) {
                return redirect('/xyz-2/home');
            } else if (Auth::user()->role == 4) {
                return redirect('/xyz/home');
            } else if (Auth::user()->role == 5) {
                return redirect('/xyz-1/home');
            } else if (Auth::user()->role == 6) {
                return redirect('/xyz-2/home');
            }
        }

        $data = [
            'title' => 'Login'
        ];

        return view('auth/login', compact('data'));
    }

    public function login(Request $request)
    {
        $request['username'] = strtolower($request['username']);
        $request->validate([
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:8|max:255'
        ]);

        $dataUser = User::where('username', $request->username)->first();
        if (!$dataUser) {
            return back()->withErrors([
                'username' => 'User not registered'
            ])->onlyInput('username');
        }

        $dataLogin = [
            'username'  => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($dataLogin)) {
            if ($dataUser['role'] == 1) {
                return redirect('/xyz/home');
            } else if ($dataUser['role'] == 2) {
                return redirect('/xyz-1/home');
            } else if ($dataUser['role'] == 3) {
                return redirect('/xyz-2/home');
            } else if ($dataUser['role'] == 4) {
                return redirect('/xyz/home');
            } else if ($dataUser['role'] == 5) {
                return redirect('/xyz-1/home');
            } else if ($dataUser['role'] == 6) {
                return redirect('/xyz-2/home');
            }
        }

        return back()->withErrors([
            'username' => 'Username or Password is wrong!!', 'password' => 'Username or Password is wrong!'
        ])->onlyInput('username');
    }

    public function registerPage()
    {
        $data = [
            'title' => 'Register'
        ];

        return view('auth/register', compact('data'));
    }

    public function register(Request $request)
    {
        // if (!(Auth::check())) {
        //     return redirect('/login');
        // }
        // if (Auth::user()->role !== 1) {
        //     return redirect('/office');
        // }

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:255|unique:users',
            'name' => 'required|string|max:255',
            'role' => 'required|not_in:0',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required|min:8|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $request['username'] = strtolower($request['username']);
        $request["password"] = Hash::make($request["password"]);
        if ($request['role'] == 1) {
            $request['position'] = "Admin PT. XYZ";
        } else if ($request['role'] == 2) {
            $request['position'] = "Admin PT. XYZ-1";
        } else if ($request['role'] == 3) {
            $request['position'] = "Admin PT. XYZ-2";
        } else if ($request['role'] == 4) {
            $request['position'] = "Manager";
        } else if ($request['role'] == 5) {
            $request['position'] = "Supervisor PT. XYZ-1";
        } else if ($request['role'] == 6) {
            $request['position'] = "Supervisor PT. XYZ-2";
        }
        User::create($request->only(['username', 'name', 'password', 'position', 'role']));

        return redirect()->back()->with("registerSuccess", "Register success!");
    }

    public function edit(Request $request)
    {
        if (!(Auth::check())) {
            return redirect('/');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'role' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request['role'] == 1) {
            $request['position'] = "Admin PT. XYZ";
        } else if ($request['role'] == 2) {
            $request['position'] = "Admin PT. XYZ-1";
        } else if ($request['role'] == 3) {
            $request['position'] = "Admin PT. XYZ-2";
        } else if ($request['role'] == 4) {
            $request['position'] = "Manager";
        } else if ($request['role'] == 5) {
            $request['position'] = "Supervisor PT. XYZ-1";
        } else if ($request['role'] == 6) {
            $request['position'] = "Supervisor PT. XYZ-2";
        }

        $user = User::find($request['id']);
        $user->update([
            'name' => $request['name'],
            'role' => $request['role'],
            'position' => $request['position'],
        ]);

        return redirect()->back()->with("editSuccess", "Data petugas berhasil diperbarui.");
    }

    public function changePassword(Request $request)
    {
        if (!(Auth::check())) {
            return redirect('/');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required|min:8|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find(Auth::user()->id);
        $request["password"] = Hash::make($request["password"]);
        $user->update([
            'password' => $request['password']
        ]);

        return redirect()->back()->with("changePasswordSuccess", "Password berhasil diperbarui.");
    }

    public function deleteUser($id)
    {
        if (!(Auth::check())) {
            return redirect('/');
        }
        if ((Auth::user()->role != 1) && (Auth::user()->role != 2) && (Auth::user()->role != 3)) {
            dd(Auth::user()->role);
            return redirect('/');
        }

        $userId = Auth::user()->id;

        if ($id == $userId) {
            return redirect()->back();
        }

        $dataUser = User::find($id);

        if ($dataUser === null) {
            return redirect()->back();
        }

        $dataUser->delete();
        return redirect()->back()->with("deleteSuccess", "Success delete user.");
    }

    public function logout()
    {
        if (!(Auth::check())) {
            return redirect('/');
        }

        Auth::logout();
        session()->flush();
        return redirect('/')->with("logoutSuccess", "See yaa!");
    }
}
