<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Burger;
use App\User;

class DashboardController extends Controller
{
    public function resources(){
        $userCount = User::count();
        $burgerCount = Burger::count();

        return view('admin.dashboard',compact('userCount','burgerCount'));

    }
}
