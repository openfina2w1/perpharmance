<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productdetails;
use App\Selfanalyzeusersession;

class MysessionController extends Controller
{
    function index() {
        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        $sidebar = "default-sidebar";
        $self_analyze_user_sessions = Selfanalyzeusersession::all();
        return view('admin.mysession.mysession', compact('sidebar', 'self_analyze_user_sessions'));
    }
}
