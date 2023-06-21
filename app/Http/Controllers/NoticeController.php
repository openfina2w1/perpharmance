<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use DB;

class NoticeController extends Controller
{
    public function index()
    {
        $categories = Notice::orderBy('id', 'DESC')->paginate(1);
        print_r($categories);
    }

    public function getAllTable(Type $var = null)
    {
        $tables = app('App\Http\Controllers\MultidbconfigController')->dbConfig($db_name = "ktph");
        foreach ($tables as $table) {
            foreach ($table as $key => $value)
                echo $value."<br>";
                /** Get All Field Name From Table - Start */
                $fields = DB::getSchemaBuilder()->getColumnListing($value);
                echo "<pre>";
                print_r($fields);
                /** Get All Field Name From Table - End */
        }
    }
}
