<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminTaxonomiesController extends Controller
{
    public function index()
    {
        // 
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
        $name = request("name");

        if (request("type") == "category") {
            // làm chuyen muc trong này
            $category = new Category;
            $category->category_name = $name;
            $category->save();
            return redirect("/be-admin/taxonomies")
            ->with('alert', "Tạo nhà sản xuất thành công!");
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
            $category = Category::where("category_id", $id)->get()[0];
            return view('admin.pages.taxonomies.edit-category', [
                'category' => $category,]);
        }
    }

    public function update(Request $request, $id)
    {
        $name = request("name");

        if (request("type") == "category") {
            // làm chuyen muc trong này
            $category = Category::find($id);
            $name && $category->category_name = $name;
            $category->save();
            return redirect("/be-admin/taxonomies/" . $id . "/edit?type=category")
            ->with("alert", "Cập nhật thành công.");
        }
    }

    public function destroy($id)
    {

        if (request("type") == "category") {
            // làm chuyen muc trong này
            Category::where("category_id", $id)->delete();
            return redirect()->back()->with("alert", "Xóa thành công.");
        }
    }
}
