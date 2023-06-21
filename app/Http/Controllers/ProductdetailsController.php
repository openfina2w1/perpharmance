<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductdetailsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Productdetails;
use Illuminate\Support\Facades\Auth;

class ProductdetailsController extends Controller
{
    public function index() 
    {
        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        return view('admin.import.importfile', compact('productdetails'));
    }

    public function import(Request $request) 
    {
        $data = Auth::id();
        
        Excel::queueImport(new ProductdetailsImport($data), $request['file']);
        
        return redirect('import')->with('message', 'Imported successfully!');
    }
}
