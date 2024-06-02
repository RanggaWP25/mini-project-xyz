<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Xyz1Controller extends Controller
{
    public function home()
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 2) && (Auth::user()->role != 5)) {
                return redirect('/');
            }
        }

        $data = [
            'title' => 'Home'
        ];

        return view("xyz-1/home", compact('data'));
    }

    public function registerUser()
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if (Auth::user()->role != 2) {
                return redirect('/');
            }
        }

        $data = [
            'title' => 'Register User'
        ];

        return view("xyz-1/registerUser", compact('data'));
    }

    public function dataUser()
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 2) && (Auth::user()->role != 5)) {
                return redirect('/');
            }
        }

        $data = [
            'title' => 'Data User',
            'user' => User::where('role', 2)->orWhere('role', 5)->get()
        ];

        return view("xyz-1/dataUser", compact('data'));
    }

    public function editUser($id)
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 2) && (Auth::user()->role != 5)) {
                return redirect('/');
            }
        }

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with("userUndifined", "Terjadi Kesalahan.");
        }

        $data = [
            'title' => 'Edit User',
            'user' => $user
        ];

        return view("xyz-1/editUser", compact('data'));
    }

    public function changePassword($id)
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 2) && (Auth::user()->role != 5)) {
                return redirect('/');
            }
        }

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with("userUndifined", "Terjadi Kesalahan.");
        }

        $data = [
            'title' => 'Change Password',
            'user' => $user
        ];

        return view("xyz-1/changePassword", compact('data'));
    }
}
