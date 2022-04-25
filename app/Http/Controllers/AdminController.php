<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index()
    {
        $patient = Patient::all()->count();
        return view('admin.dashboard', compact('patient'));
    }

    public function adminProfile()
    {
        $user = Auth::user('id');
        return view('admin.profile', compact('user'));
    }
}
