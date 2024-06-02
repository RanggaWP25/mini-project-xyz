<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XyzController extends Controller
{
    public function home()
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 1) && (Auth::user()->role != 4)) {
                return redirect('/');
            }
        }

        $data = [
            'title' => 'Home'
        ];

        return view("xyz/home", compact('data'));
    }

    public function registerUser()
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if (Auth::user()->role != 1) {
                return redirect('/');
            }
        }

        $data = [
            'title' => 'Register User'
        ];

        return view("xyz/registerUser", compact('data'));
    }

    public function dataUser()
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 1) && (Auth::user()->role != 4)) {
                return redirect('/');
            }
        }

        if (Auth::user()->role == 1) {
            $data = [
                'title' => 'Data User',
                'user' => User::where('role', 1)->orWhere('role', 4)->get()
            ];
        } else {
            $data = [
                'title' => 'Data User',
                'user' => User::where('role', 5)->orWhere('role', 6)->get()
            ];
        }

        return view("xyz/dataUser", compact('data'));
    }

    public function editUser($id)
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 1) && (Auth::user()->role != 4)) {
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

        return view("xyz/editUser", compact('data'));
    }

    public function changePassword($id)
    {
        if (!(Auth::check())) {
            return redirect('/');
        } else {
            if ((Auth::user()->role != 1) && (Auth::user()->role != 4)) {
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

        return view("xyz/changePassword", compact('data'));
    }
}
