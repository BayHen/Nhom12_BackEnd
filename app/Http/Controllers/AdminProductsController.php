<?php

namespace App\Http\Controllers;

use App\Categorizable;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{

    public function index()
    {
        // count all products
        $products = Product::orderBy("product_id", "DESC");
        $countAllProduct = Product::all()->count();

        // search form
        $search = request()->query("search");
        if ($search) {
            $products = Product::query()
                ->where('product_name', 'LIKE', "%{$search}%")
                ->orWhere('product_description', 'LIKE', "%{$search}%");

            $countAllProduct = $products->count();
        }

        // products pagination
        $perPage = request()->query("perPage");
        if (!$perPage) $perPage = 6;
        $products = $products->paginate($perPage);

        return view('admin.pages.products.index', [
            'countAllProduct' => $countAllProduct,
            'products' => $products,
            'perPage' => $perPage,
        ]);
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(Request $request)
    {
        $name = request("name");
        $categories = request("category");
        $description = request("description");
        $price = request("price");
        $available = request("available");
        $feature = request("feature");
        $image = $request->file('image');
        $image && $image->move('assets/img/gallery', $image->getClientOriginalName());

        $product = new Product;
        $product->product_name = $name;
        $product->product_description = $description;
        $product->product_price = $price;
        $product->product_available = $available;
        $product->product_feature = $feature;
        $product->category_id = $categories;
        $image && $product->product_image = $image->getClientOriginalName();
        $product->save();
        $product = $product->fresh();


        return redirect("/be-admin/products")
            ->with('alert', "Tạo sản phẩm thành công!");
    }

    public function show($id)
    {
        return redirect()->action('AdminProductsController@edit', [$id]);
    }

    public function edit($id)
    {
        $product = Product::where("product_id", $id)->get()[0];
        return view('admin.pages.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $name = request("name");
        $categories = request("category");
        $description = request("description");
        $price = request("price");
        $available = request("available");
        $feature = request("feature");
        $image = $request->file('image');
        $image && $image->move('assets/img/gallery', $image->getClientOriginalName());

        $product = Product::find($id);
        $name && $product->product_name = $name;
        $description && $product->product_description = $description;
        $price && $product->product_price = $price;
        $feature && $product->product_feature = $feature;
        $categories && $product->category_id = $categories;
        $available && $product->product_available = $available;
        $image && $product->product_image =  $image->getClientOriginalName();
        $product->save();

        Product::where("product_id", $id)->delete();
        // error_log(json_encode($categories));
        return redirect("/be-admin/products/" . $id . "/edit")
            ->with("alert", "Cập nhật thành công.");
    }

    public function destroy($id)
    {
        Product::where("product_id", $id)->delete();
        return redirect()->back()->with("alert", "Xóa thành công.");
    }
}
