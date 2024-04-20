<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('template.admin.dashboard');
        } elseif (Auth::user()->hasRole('user')) {
            return view('template.user.dashboard');
        }
    }
}
