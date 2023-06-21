<?php

namespace App\Http\Controllers;
use App\Http\Requests\DatasourceRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Config;
use DB;
use App\Notice;

class DatasourceController extends Controller
{
    public function index()
    {
        return view('admin.datasource.index');
    }

    public function upload(DatasourceRequest $request)
    {
        $validateData = $request->validated();
        if($request->hasFile('csvfile')){
            $file = $request->file('csvfile');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/csv/', $fileName);
            // $category->image = $fileName;
        }
        if($request->hasFile('xmlfile')){
            $file = $request->file('xmlfile');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/xml/', $fileName);
            // $category->image = $fileName;
        }
        if($request->hasFile('xlsfile')){
            $file = $request->file('xlsfile');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/xls/', $fileName);
            // $category->image = $fileName;
        }
        if($request->hasFile('jsonfile')){
            $file = $request->file('jsonfile');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/json/', $fileName);
            // $category->image = $fileName;
        }
        return redirect('datasource')->with('message', 'Uploaded successfully.');
    }
}
