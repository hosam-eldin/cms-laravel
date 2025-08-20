<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $category)
    {
        $search = request()->query('search');
        if ($search) {
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        } else {
            $posts = $category->posts()->simplePaginate(1);
        }
        return view('blog.category')
            ->with('category', $category)
            ->with('posts', $posts)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        $search = request()->query('search');
        if ($search) {
            $posts = $tag->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        } else {
            $posts = $tag->posts()->simplePaginate(1);
        }
        return view('blog.tag')
            ->with('tag', $tag)
            ->with('posts', $posts)
            ->with('tags', Tag::all())
            ->with('categories', Category::all());
    }
}