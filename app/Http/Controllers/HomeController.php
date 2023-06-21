<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Userrole;
use App\Department;
use App\Country;
use App\State;
use App\Productdetails;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userrole = Userrole::all();
        $department = Department::all();
        $country = Country::all();
        $state = State::all();
        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        $sidebar = "default-sidebar";
        // $productdetails = [];
        // Productdetails::orderBy('id')->chunk(100, function ($users) {
        //     foreach ($users as $user) {
        //         echo '<pre>';
        //         print_r($user);
        //     }
        // });

        return view('admin.dashboard', compact('sidebar', 'user', 'userrole', 'department', 'country', 'state', 'productdetails'));
    }

    public function get_product(Request $request)
    {
        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        if ($request->ajax()) {
    		$view = view('include.data', compact('productdetails'))->render();
            return response()->json(['html'=>$view]);
        }
    }
}
