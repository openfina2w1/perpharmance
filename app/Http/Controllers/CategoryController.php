<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Config;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        echo \DB::connection()->getDatabaseName();
        $categories = Category::orderBy('id', 'DESC')->paginate(1);
        $sidebar = "default-sidebar";
        return view('admin.category.index', compact('categories', 'sidebar'));
    }

    public function Create()
    {
        return view('admin.category.create');
    }

    public function add(CategoryFormRequest $request)
    {
        $validateData = $request->validated();
        $category = new Category;
        $category->name = $validateData['name'];
        $category->slug = $validateData['slug'];
        $category->description = $validateData['description'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }
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
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request['status'];
        $category->save();
        
        return redirect('category')->with('message', 'Category added successfully.');
    }

    public function edit(Category $category)
    {
        $sidebar = "default-sidebar";
        return view('admin.category.edit', compact('category', 'sidebar'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validateData = $request->validated();
        $category = Category::findOrFail($category);
        
        $category->name = $validateData['name'];
        $category->slug = $validateData['slug'];
        $category->description = $validateData['description'];
        if($request->hasFile('image')){
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request['status'];
        $category->update();
        
        return redirect('category')->with('message', 'Category updated successfully.');
    }

    public function verify($user_id)
    { echo $user_id;
        // $user = User::findOrFail($id);   
        // $user->password = Hash::make($data['password']);
        // $user->update();
        // return redirect('register')->with('message', 'Verified successfully.');
    }

    public function readCSV()
    {
        $csvFile = fopen(base_path("public/uploads/csv/1684219749.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                print_r($data);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }

    public function readXML()
    {
        $xmlString = file_get_contents("uploads/xml/1684220618.xml");
        $xmlObject = simplexml_load_string($xmlString);
                
        $json = json_encode($xmlObject);
        $array = json_decode($json, true); 
        print_r($array);
    }

    public function readXLS()
    {
        // $csvFile = file_get_contents(("uploads/xls/1684221464.xls"), "r");
        $address = public_path('uploads/xls/1684221464.xls');
        Excel::load($address, function($reader) {
            $results = $reader->get();
            dd($results);
        });
    }

    public function readJson()
    {
        $json = json_decode(file_get_contents("uploads/json/1684224249.json"), true);
        print_r($json); 
    }

    
}
