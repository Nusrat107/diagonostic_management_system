<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BlogController extends Controller
{
        public function blog()
    {
        $blogs = Blog::all();
        return view('backend.blog.blog', compact('blogs'));
    }

 
    public function blogAdd()
    {
        return view('backend.blog.blog-add');
    }


    public function blogStore(Request $request)
    {
        $blog = new Blog();
        $blog->name = $request->name;
        $blog->category = $request->category;
        $blog->subcategory = $request->subcategory;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->status = $request->status;

        if ($request->hasFile('image')) {
            $imageName = rand() . '-blog.' . $request->image->extension();
            $request->image->move(public_path('backend/images/blog/'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        return redirect('/admin/blog');
    }


    public function blogView($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.blog-view', compact('blog'));
    }


    public function blogEdit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.blog-edit', compact('blog'));
    }


    public function blogUpdate(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->name = $request->name;
        $blog->category = $request->category;
        $blog->subcategory = $request->subcategory;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->status = $request->status;

       
        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('backend/images/blog/' . $blog->image))) {
                unlink(public_path('backend/images/blog/' . $blog->image));
            }
            $imageName = rand() . '-blog.' . $request->image->extension();
            $request->image->move(public_path('backend/images/blog/'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        return redirect('/admin/blog');
    }


    public function blogDelete($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('backend/images/blog/' . $blog->image))) {
            unlink(public_path('backend/images/blog/' . $blog->image));
        }

        $blog->delete();
        return redirect('/admin/blog');
    }
}
