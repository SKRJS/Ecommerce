<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\catagory;
use App\Models\Order;
use App\Models\subCategory;
use App\Models\product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Exception;

use WithPagination;

class homeController extends Controller
{
    public function home()
    {
        return view('fontend.index');
    }
    public function product()
    {
        return view('fontend.product');
    }

    public function about()
    {
        return view('fontend.about');
    }



    public function shop()
    {
        $subCategories = subCategory::latest()->get();
        $products = product::where('status', 1)->orderBy('id', 'ASC')->simplePaginate(20);
        return view('fontend.shop', compact('subCategories', 'products'));
    }


    public function catWiseProduct(Request $request, $slug)
    {
        $category = catagory::where('category_slug', $slug)->firstOrFail();
        $productWise = product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'ASC')
            ->simplePaginate(20);
        return view('fontend.cateWise', compact('productWise', 'category'));
    }

    public function SubWiseProduct(Request $request, $id)
    {

        $subCategory = subCategory::findOrFail($id);
        $productWise = product::where('status', 1)
            ->where('sub_id', $id)
            ->orderBy('id', 'ASC')
            ->get();
        return view('fontend.SubcateWise', compact('productWise', 'subCategory'));
    }


    public function singleProduct($id)
    {
        $product = product::findOrFail($id);
        return view('fontend.product', compact('product'));
    }


    public function addToCartData($id)
    {
        $product = Product::findOrFail($id);
        $data = array();
        $data['id'] = $id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        $data['price'] = $product->product_price;
        $data['options']['image'] = $product->product_img;
        Cart::add($data);
        return response()->json(['success' => 'Successfully Product Added']);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        Cart::add([
            'id' => $id,
            'name' => $request->product_name,
            'qty' => $request->quantity,
            'price' => $product->product_price,
            'options' => [
                'image' => $product->product_img,
            ],
        ]);

        return response()->json(['success' => 'Successfully Add To Cart']);
    }

    public function miniProduct()
    {
        $cartCount = Cart::count();
        return response()->json(array(
            'cartQty' => $cartCount
        ));
    }


    public function cartView()
    {
        $cartView = Cart::content();
        return view('fontend.cart', compact('cartView'));
    }

    public function GetCartProduct()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal

        ));
    }


    public function CartRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);
    } // End Method



    public function CartDecrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json(['success' => 'Successfully Decrement From Cart']);
    } // 

    public function CartIncrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json(['success' => 'Successfully Increment From Cart']);
    } // 

    public function checkout()
    {
        if (Auth::check()) {

            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                return view('fontend.checkout', compact('carts', 'cartQty', 'cartTotal'));
            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }
        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    }

    // search 
    public function searchData(Request $request)
    {
        $search = $request->search;
        $posts = Product::where('product_name', 'like', "%$search%")->simplePaginate(20);

        return view('fontend.search', compact('posts', 'search'));
    }

    //blog 
    public function blog()
    {
        return view('fontend.blog');
    }

    public function showBlogPage($id)
    {
        $blog = blog::findOrFail($id);
        return view('fontend.blogSingle', compact('blog'));
    }
    function return()
    {
        return view('fontend.return');
    }
    function privacy()
    {
        return view('fontend.privacy');
    }

    // google login 

    public function GoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }


    public function Callback()
    {
        try {
            // Get Google user details
            $user = Socialite::driver('google')->user();
            $existingUser = User::where('email', $user->email)->first();

            // Capture the current guest cart (before login)
            $guestCart = Cart::content();

            if (!$existingUser) {
                // Create a new user if they don't exist
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make('123456dummy'),
                    'username' => 'user',
                ]);

                // Log in the new user
                Auth::login($newUser);
            } else {
                // Log in the existing user
                Auth::login($existingUser);
            }

            // Merge the guest cart with the user's cart
            $this->mergeGuestCartWithUserCart($guestCart);

            // Redirect the user to the cart view
            return redirect()->route('cartView');
        } catch (\Exception $e) {
            // If an error occurs, redirect to the login page with the error message
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }


    private function mergeGuestCartWithUserCart($guestCart)
    {
        $userCart = Cart::content();

        foreach ($guestCart as $item) {
            // Check if the product is already in the user's cart
            $existingCartItem = $userCart->where('id', $item->id)->first();

            // If the item doesn't exist in the user's cart, add it
            if (!$existingCartItem) {
                Cart::add($item->id, $item->name, $item->qty, $item->price, $item->options);
            }
        }
    }




    function charity()
    {
        return view('fontend.charity');
    }

    function seoAdd()
    {
        return view('admin.seo.add_seo');
    }

    function allCoupon()
    {
        return view('admin.coupon.addCoupon');
    }


    function addCoupon()
    {
        return view('admin.coupon.allCoupon');
    }

    // siteSystem 

    function siteSystem()
    {
        return view('admin.siteSystem.siteSystem');
    }
}
