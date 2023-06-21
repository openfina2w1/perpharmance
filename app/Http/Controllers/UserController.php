<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('active_status', 'N')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.user.index', compact('users'));
    }
}
