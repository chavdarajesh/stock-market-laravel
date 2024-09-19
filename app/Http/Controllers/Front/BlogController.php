<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function list()
    {
        $Blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('front.blogs.list', ['Blogs' => $Blogs]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $Blogs = Blog::where('title', 'like', "%$search%")->where('status', 1)->orderBy('id', 'DESC')
                ->paginate(6);
            if ($Blogs) {
                return view('front.blogs.search-list', ['search' => $search, 'Blogs' => $Blogs]);
            } else {
                return redirect()->route('front.blog.list');
            }
        } else {
            return redirect()->route('front.blog.list');
        }
    }

    public function details($id)
    {
        if ($id) {
            $Blog = Blog::where('status', 1)->where('id', $id)->first();
            if ($Blog) {
                $latestBlogs = Blog::where('id', '!=', $id)->where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
                $tagIds = $Blog->tags()->pluck('tag_id')->toArray();
                $tags = Tag::where('status', 1)->whereNotIn('id', $tagIds)->orderBy('id', 'DESC')->limit(7)->get();
                $categorys = Category::where('status', 1)->where('id', '!=', $Blog->category_id)->orderBy('id', 'DESC')->limit(7)->get();
                $comments = Comment::where('status', 1)->where('blog_id', $Blog->id)->orderBy('id', 'DESC')->get();
                $otherComments = Comment::where('status', 1)->where('blog_id', '!=', $Blog->id)->orderBy('id', 'DESC')->limit(7)->get();
                return view('front.blogs.details', ['Blog' => $Blog, 'latestBlogs' => $latestBlogs, 'tags' => $tags, 'categorys' => $categorys, 'comments' => $comments, 'otherComments' => $otherComments]);
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'Blog Not Found..!');
        }
    }

    public function categoryList($id)
    {
        if ($id) {
            $Category = Category::where('status', 1)->where('id', $id)->first();
            if ($Category) {
                $Blogs = Blog::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->paginate(3);
                return view('front.blogs.category-list', ['Category' => $Category, 'Blogs' => $Blogs]);
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'Category Not Found..!');
        }
    }
}
