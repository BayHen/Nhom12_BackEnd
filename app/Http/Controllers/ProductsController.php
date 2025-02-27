<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Product;

class ProductsController extends Controller
{
    public function index(){
        $customView = false;
        $products = Product::orderBy("product_id", "DESC")->get();
        $newProducts = Product::all()->take(3);

        $sort = request()->query("sort");
        if (!$sort) $sort = "default";
        if ($sort === "nameAZ") $products = Product::orderBy("product_name", "ASC")->get();
        if ($sort === "nameZA") $products = Product::orderBy("product_name", "DESC")->get();
        if ($sort === "priceSB") $products = Product::orderBy("product_price", "ASC")->get();
        if ($sort === "priceBS") $products = Product::orderBy("product_price", "DESC")->get();

        // search form
        $search = request()->query("search");
        if ($search) {
            $products = Product::query()
                ->where('product_name', 'LIKE', "%{$search}%")
                ->orWhere('product_description', 'LIKE', "%{$search}%")->get();
            $customView = true;
        }

        $category = request()->query("category");
        $nameCategory = "";
        if ($category) {
            $findCategory = Category::findOrFail($category);
            $products = $findCategory->products;
            $nameCategory = $findCategory->category_name;
            $customView = true;
        }

        $perPage = request()->query("perPage");
        if (!$perPage) $perPage = 6;
        $countAllProduct = count($products);
        $products = $this->paginate($products, $perPage);

        return view('client.pages.products.index', [
            'products' => $products,
            'newProducts' => $newProducts,
            'countAllProduct' => $countAllProduct,
            'perPage' => $perPage,
            'customView' => $customView,
            'nameCategory' => $nameCategory,
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $comments = Comment::where("product_id", $id)->orderBy('comment_id', 'DESC')->get();

        $user = session(".config_user");
        $isRatingOnce = false;
        if ($user) {
            $isRatingOnce = Comment::where([
                ['product_id', '=', $id],
                ['user_id', '=', $user->user_id],
                ["comment_rating", ">", 0]
            ])->get();
            $isRatingOnce = count($isRatingOnce) > 0;
        }

        $productsRelated = Product::where("category_id", $product->category_id)->get()->take(3);
        return view('client.pages.products.show', [
            'product' => $product,
            'comments' => $comments,
            'productsRelated' => $productsRelated,
            'isRatingOnce' => $isRatingOnce
        ]);
    }   
}
