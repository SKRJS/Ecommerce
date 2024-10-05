<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\catagory;
use App\Models\product;
use App\Models\subCategory;
use Carbon\Carbon;
use Image;
use Toastr;


class productController extends Controller
{
    // product
    public function allProduct()
    {
        $product = product::latest()->get();
        return view('admin.product.all_product', compact('product'));
    }
    public function addProduct()
    {
        $sub = subCategory::latest()->get();
        $category = catagory::latest()->get();
        return view('admin.product.add_product', compact('category', 'sub'));
    }

    public function storeProduct(Request $request)
    {
        $img = $request->file('product_img');
        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        Image::make($img)
            ->resize(900, 900)
            ->save('upload/product/product_img/' . $name_gen);
        $save_url = 'upload/product/product_img/' . $name_gen;

        $img2 = $request->file('product_img2');
        $name_gen2 = hexdec(uniqid()) . '.' . $img2->getClientOriginalExtension();
        Image::make($img2)
            ->resize(900, 900)
            ->save('upload/product/product_img/' . $name_gen2);
        $save_url2 = 'upload/product/product_img/' . $name_gen2;

        product::insertGetId([

            'category_id' => $request->category_id,
            'sub_id' => $request->sub_id,
            'site_id' => $request->site_id,
            'product_name' => $request->product_name,
            'product_qty' => $request->product_qty,
            'regular' => $request->regular,
            'product_img' => $save_url,
            'product_img2' => $save_url2,
            'product_price' => $request->product_price,
            'product_message' => $request->product_message,
            'created_at' => Carbon::now(),
            'status' => 1,

        ]);

        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
        return redirect()->route('allProduct');
    }

    public function productEdit($id)
    {
        $product = product::findOrFail($id);
        $category = catagory::latest()->get();
        $sub = subCategory::latest()->get();
        return view('admin.product.editProduct', compact('product', 'category', 'sub'));
    }
    // public function updateCategory(Request $request)
    // {
    //     $cateId = $request->id;
    //     catagory::findOrFail($cateId)->update([
    //         'cate_name' => $request->cate_name,
    //     ]);

    //     Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

    //     return redirect()->route('allCategory');
    // }


    public function productUpdate(Request $request)
    {
        $product_id = $request->id;
        $old_img = $request->product_img;

        if ($request->file('product_img')) {
            $img = $request->file('product_img');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)
                ->resize(900, 900)
                ->save('upload/product/product_img/' . $name_gen);
            $save_url = 'upload/product/product_img/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            product::findOrFail($product_id)->update([
                'category_id' => $request->category_id,
                'sub_id' => $request->sub_id,
                'site_id' => $request->site_id,
                'product_name' => $request->product_name,
                'product_qty' => $request->product_qty,
                'product_img' => $save_url,
                'product_price' => $request->product_price,
                'product_message' => $request->product_message,
                'created_at' => Carbon::now(),
                'status' => 1,
            ]);

            Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

            return redirect()->route('allProduct');
        }
        if ($request->file('product_img2')) {

            $img = $request->file('product_img2');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)
                ->resize(900, 900)
                ->save('upload/product/product_img/' . $name_gen);
            $save_url = 'upload/product/product_img/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            product::findOrFail($product_id)->update([
                'category_id' => $request->category_id,
                'sub_id' => $request->sub_id,
                'site_id' => $request->site_id,
                'product_name' => $request->product_name,
                'product_qty' => $request->product_qty,
                'product_img2' => $save_url,
                'product_price' => $request->product_price,
                'product_message' => $request->product_message,
                'created_at' => Carbon::now(),
                'status' => 1,
            ]);

            Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);

            return redirect()->route('allProduct');
        } else {

            product::findOrFail($product_id)->update([
                'category_id' => $request->category_id,
                'sub_id' => $request->sub_id,
                'site_id' => $request->site_id,
                'product_name' => $request->product_name,
                'product_qty' => $request->product_qty,
                'product_price' => $request->product_price,
                'product_message' => $request->product_message,
                'created_at' => Carbon::now(),
                'status' => 1,
            ]);
            return redirect()->route('allProduct');
        }
    }

    public function deleteProduct($id)
    {
        product::findOrFail($id)->delete();
        Toastr::info('Messages in here', 'Title', ['positionClass' => 'toast-top-right']);
        return redirect()->route('allProduct');
    }
}
