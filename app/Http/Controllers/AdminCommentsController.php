<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        var_dump($comments[0]->user->user_username);
        var_dump($comments[0]->product->product_name);
        return view('admin.pages.comments.index');
    }

    public function destroy($id)
    {
        return "xóa bình luận " . $id;
    }

    public function store(Request $request)
    {
        $rating = request("rating");
        $content = request("content");
        $product = request("product");
        $user = session('.config_user')->user_id;

        $newComment = new Comment;
        $newComment->comment_rating = $rating;
        $newComment->comment_content = $content;
        $newComment->product_id = $product;
        $newComment->user_id = $user;
        $newComment->save();

        return redirect()->back();
    }
}
