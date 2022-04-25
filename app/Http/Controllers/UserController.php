<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isUser');
    }

    function index()
    {
        $patient = Patient::all()->count();
        return view('operator.dashboard', compact('patient'));
    }
    public function operatorProfile()
    {
        $user = Auth::user('id');
        return view('operator.profile', compact('user'));
    }
}
