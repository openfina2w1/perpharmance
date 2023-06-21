<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use DB;

class MultidbconfigController extends Controller
{
    public function index()
    {
        
    }

    public function dbConfig($db_name)
    {
        // $preDatabase = Config::get('database.connections.mysql.database');
        // DB::statement("CREATE DATABASE IF NOT EXISTS ktph1");

        Config::set('database.connections.mysql.database', $db_name);
        // Config::set('database.connections.mysql.host', "");
        // Config::set('database.connections.mysql.username', "");
        // Config::set('database.connections.mysql.password', "");
        DB::purge('mysql');
        DB::reconnect('mysql');

        /** Get Current Connected Database Name */
        // echo \DB::connection()->getDatabaseName();

        /** Get All Table From Database - Start */
        return $tables = DB::select('SHOW TABLES');
        // echo "<pre>";
        // print_r($tables);
        foreach ($tables as $table) {
            foreach ($table as $key => $value)
                echo $value."<br>";
                /** Get All Field Name From Table - Start */
                $fields = DB::getSchemaBuilder()->getColumnListing($value);
                echo "<pre>";
                print_r($fields);
                /** Get All Field Name From Table - End */
        }
        /** Get All Table From Database - End */
        return dd('create database and user data');
    }
}
