<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminTaxonomiesController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();
        var_dump($categories[0]->category_name);

        return view('admin.pages.taxonomies.index');
    }

    public function create()
    {
        

        if (request()->query("type") == "category") {
            // làm chuyen muc trong này
            return view('admin.pages.taxonomies.create-category');
        }
    }

    public function store()
    {
        

        if (request("type") == "category") {
            // làm chuyen muc trong này
            return "tạo loại";
        }
    }
    
    public function show($id)
    {
        return redirect()->action('AdminTaxonomiesController@edit', [$id]);
    }

    public function edit($id)
    {
        

        if (request()->query("type") == "category") {
            // làm chuyen muc trong này
            return view('admin.pages.taxonomies.edit-category');
        }
    }

    public function update(Request $request, $id)
    {
       

        if (request("type") == "category") {
            // làm chuyen muc trong này
            return "cập nhật loại";
        }
    }

    public function destroy($id)
    {
        

        if (request("type") == "category") {
            // làm chuyen muc trong này
            return "xóa loại";
        }
    }
}
