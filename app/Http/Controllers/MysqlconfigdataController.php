<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MysqlconfigdataController extends Controller
{
    public function index()
    {
        return view('admin.datasource.mysqlconfig');
    }

    public function add(CategoryFormRequest $request)
    {
        $validateData = $request->validated();
        $category = new Category;
        $category->db_name = $validateData['db_name'];
        $category->user_name = $validateData['user_name'];
        $category->password = $validateData['password]'];        
        $category->host_name = $validateData['host_name'];
        $category->save();
        
        return redirect('mysql-config')->with('message', 'Added successfully.');
    }
}
