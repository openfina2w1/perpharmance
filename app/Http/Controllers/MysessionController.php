<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productdetails;
use App\Selfanalyzeusersession;
use Illuminate\Support\Facades\Auth;

class MysessionController extends Controller
{
    function index() {
        $user_id = Auth::id();
        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        $sidebar = "default-sidebar";
        $page_name = "my_sessions";
        $self_analyze_user_sessions = Selfanalyzeusersession::where('created_by', $user_id)->get();
        return view('admin.mysession.mysession', compact('sidebar', 'self_analyze_user_sessions', 'page_name'));
    }
}
