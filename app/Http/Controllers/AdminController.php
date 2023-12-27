<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Form;
use App\Models\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalUser = User::count();
        $totalForm = Form::count();
        $totalAttended = Attendance::count();
        return view('admin.dashboard',compact('totalUser','totalForm', 'totalAttended'));
    }

}
