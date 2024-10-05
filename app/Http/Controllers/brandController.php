<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Models\Brand;

use Image;
use Toastr;

class brandController extends Controller
{
    // brand
    public function addBrand()
    {
        return view('admin.brand.add_brand');
    }

    public function allBrand()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.all_brand', compact('brands'));
    }

    public function storeBrand(Request $request)
    {
        // $img = $request->file('brand_img');
        // $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        // Image::make($img)
        //     ->resize(300, 300)
        //     ->save('upload/brand/' . $name_gen);
        // $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'percentage' => $request->percentage,
            // 'brand_img' => $save_url,
        ]);

        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

        return redirect()->route('all_brand');
    }

    public function brandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.editBrand', compact('brand'));
    }

    public function updateBrand(Request $request)
    {
        $brand_id = $request->id;
        $old_img = $request->brand_images;

        if ($request->file('brand_img')) {
            $img = $request->file('brand_img');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)
                ->resize(300, 300)
                ->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_img' => $save_url,
            ]);

            Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

            return redirect()->route('all_brand');
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            ]);

            Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

            return redirect()->route('all_brand');
        }
    }

    public function deleteBrand($id)
    {
        Brand::findOrFail($id)->delete();
        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
        return redirect()->route('all_brand');
    }

    // blog storeBlog

    public function addBlog()
    {
        return view('admin.blog.add_blog');
    }


    public function storeBlog(Request $request)
    {
        $img = $request->file('blog_img');
        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        Image::make($img)
            ->resize(300, 300)
            ->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        blog::insert([
            'blog_name' => $request->blog_title,
            'blog_text' => $request->blog_text,
            'blog_img' => $save_url,
        ]);

        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

        return redirect()->route('allBlog');
    }


    public function allBlog()
    {
        $brands = blog::latest()->get();
        return view('admin.blog.all_blog', compact('brands'));
    }

    public function blogEdit($id)
    {
        $brand = blog::findOrFail($id);
        return view('admin.blog.editBlog', compact('brand'));
    }

    public function updateBlog(Request $request)
    {
        $brand_id = $request->id;
        $old_img = $request->blog_img;

        if ($request->file('blog_img')) {
            $img = $request->file('blog_img');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)
                ->resize(300, 300)
                ->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            blog::findOrFail($brand_id)->update([
                'blog_name' => $request->blog_title,
                'blog_text' =>  $request->blog_text,
                'blog_img' => $save_url,
            ]);

            Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

            return redirect()->route('allBlog');
        } else {
            blog::findOrFail($brand_id)->update([
                'blog_name' => $request->blog_title,
                'blog_text' => $request->blog_text,
            ]);

            Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

            return redirect()->route('allBlog');
        }
    }


    public function deleteBlog($id)
    {
        blog::findOrFail($id)->delete();
        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
        return redirect()->route('allBlog');
    }
}
