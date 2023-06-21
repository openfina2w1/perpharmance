<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\TesttableImport;
use Maatwebsite\Excel\Facades\Excel;

class TesttableController extends Controller
{
    public function index() 
    {
        return view('admin.import.importfile');
    }

    public function import(Request $request) 
    {
        Excel::import(new TesttableImport, $request['file']);
        
        return redirect('import')->with('message', 'Imported successfully!');
    }
}
