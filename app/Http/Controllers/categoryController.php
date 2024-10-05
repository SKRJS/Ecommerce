<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\subCategory;
use Toastr;
use Image;



class categoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.add_category');
    }

    public function storeCate(Request $request)
    {
        $img = $request->file('category_img');
        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        Image::make($img)
            ->resize(900, 900)
            ->save('upload/product/product_img/' . $name_gen);
        $save_url = 'upload/product/product_img/' . $name_gen;

        catagory::insert([
            'cate_name' => $request->cate_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->cate_name)),
            'category_img' => $save_url,
        ]);

        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
        return redirect()->route('allCategory');
    }

    public function allCategory()
    {
        $category = catagory::latest()->get();
        return view('admin.category.all_category', compact('category'));
    }

    public function cateEdit($id)
    {
        $category = catagory::findOrFail($id);
        return view('admin.category.editCate', compact('category'));
    }



    public function updateCategory(Request $request)
    {
        $cateId = $request->id;
        $img = $request->file('category_img');
        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        Image::make($img)
            ->resize(900, 900)
            ->save('upload/product/product_img/' . $name_gen);
        $save_url = 'upload/product/product_img/' . $name_gen;
        catagory::findOrFail($cateId)->update([
            'cate_name' => $request->cate_name,

            'category_img' => $save_url,
        ]);

        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

        return redirect()->route('allCategory');
    }


    public function deleteCate($id)
    {
        catagory::findOrFail($id)->delete();
        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
        return redirect()->route('allCategory');
    }


    // sub cate gory 
    public function addSubCategory()
    {
        $category = catagory::latest()->get();
        return view('admin.category.add_sub_category', compact('category'));
    }

    public function storeSubCate(Request $request)
    {

        subCategory::insert([
            'category_id' => $request->category_id,
            'Sub_category' => $request->Sub_name,
        ]);

        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
        return redirect()->route('allSubCategory');
    }

    public function allSubCategory()
    {
        $Sub = subCategory::latest()->get();
        return view('admin.category.all_sub_category', compact('Sub'));
    }


    //  add coupon area
    // public function coupon()
    // {
    //     $category = catagory::latest()->get();
    //     return view('admin.category.add_sub_category', compact('category'));
    // }

    // public function coupon(Request $request)
    // {

    //     subCategory::insert([
    //         'category_id' => $request->category_id,
    //         'Sub_category' => $request->Sub_name,
    //     ]);

    //     Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
    //     return redirect()->route('allSubCategory');
    // }

    // public function coupon()
    // {
    //     $Sub = subCategory::latest()->get();
    //     return view('admin.category.all_sub_category', compact('Sub'));
    // }
}
