<?php

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\checkOutController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\userController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('fontend.index');
// });

// home area 
Route::get('/', [homeController::class, 'home'])->name('homePage');
Route::get('/product/', [homeController::class, 'product'])->name('product');
Route::get('/shop/', [homeController::class, 'shop'])->name('shop');
Route::get('/about/', [homeController::class, 'about'])->name('about');
Route::get('/blog', [homeController::class, 'blog'])->name('blog');
Route::get('/show/Blog/Page/{id}', [homeController::class, 'showBlogPage'])->name('showBlogPage');
Route::get('/return/', [homeController::class, 'return'])->name('return');
Route::get('/privacy/', [homeController::class, 'privacy'])->name('privacy');
Route::get('/charity', [homeController::class, 'charity'])->name('charity');

// google login 

Route::get('/googleLogin', [homeController::class, 'GoogleLogin'])->name('googleLogin');
Route::get('/auth/google/callcack', [homeController::class, 'Callback'])->name('googleLoginCallback');




Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
    return view('dashboard', compact('orders'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


// add to cart

Route::post('/dcart/data/store/{id}', [homeController::class, 'addToCart']);
Route::get('/add/to/cart/{id}', [homeController::class, 'addToCartData']);
Route::get('product/single/{id}', [homeController::class, 'singleProduct'])->name('singleProduct');
Route::get('/product/mini/count', [homeController::class, 'miniProduct']);
Route::get('product/category/{slug}', [homeController::class, 'catWiseProduct']);
Route::get('product/subCategory/{id}', [homeController::class, 'SubWiseProduct']);
Route::get('/view-cart', [homeController::class, 'cartView'])->name('cartView');
Route::get('/get-cart-product', [homeController::class, 'GetCartProduct']);
Route::get('/cart-remove/{rowId}', [homeController::class, 'CartRemove']);
Route::get('/cart-decrement/{rowId}', [homeController::class, 'CartDecrement']);
Route::get('/cart-increment/{rowId}', [homeController::class, 'CartIncrement']);

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/checkout', [homeController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/store', [checkOutController::class, 'checkoutStore'])->name('checkout.store');
    Route::post('/checkout/order', [checkOutController::class, 'cashOrder'])->name('cash.order');
    Route::get('/UserOrder', [orderController::class, 'UserOrder'])->name('UserOrder');
    Route::get('/orderUserView/{id}', [orderController::class, 'orderUserView'])->name('orderUserView');
});

require __DIR__ . '/auth.php';

// admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
});

Route::get('/admin/login', [AdminController::class, 'Adminlogin']);

// vendor

Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('Vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
});

Route::get('/vendor/login', [VendorController::class, 'Vendorlogin']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    // brand
    Route::controller(brandController::class)->group(function () {
        Route::get('/add/brand', 'addBrand')->name('add_brand');
        Route::get('/all/brand', 'allBrand')->name('all_brand');
        Route::post('/store/brand', 'storeBrand')->name('brand.store');
        Route::get('/all/brand/{id}', 'brandEdit')->name('edit.brand');
        Route::post('/update/brand', 'updateBrand')->name('brand.update');
        Route::get('/delete/brand/{id}', 'deleteBrand')->name('brand.delete');
    });

    // blog

    Route::controller(brandController::class)->group(function () {
        Route::get('/add/blog', 'addBlog')->name('addBlog');
        Route::get('/all/blog', 'allBlog')->name('allBlog');
        Route::post('/store/blog', 'storeBlog')->name('store.blog');
        Route::get('/all/blog/{id}', 'blogEdit')->name('edit.blog');
        Route::post('/update/blog', 'updateBlog')->name('blog.update');
        Route::get('/delete/blog/{id}', 'deleteBlog')->name('blog.delete');
    });



    // category
    Route::controller(categoryController::class)->group(function () {
        Route::get('/add/category', 'addCategory')->name('addCategory');
        Route::get('/all/category', 'allCategory')->name('allCategory');
        Route::post('/store/category', 'storeCate')->name('cate.store');
        Route::get('/all/category/{id}', 'cateEdit')->name('edit.cate');
        Route::post('/update/category', 'updateCategory')->name('cate.update');
        Route::get('/delete/cate/{id}', 'deleteCate')->name('cate.delete');
    });


    // category
    Route::controller(categoryController::class)->group(function () {
        Route::get('/add/subCategory', 'addSubCategory')->name('addSubCategory');
        Route::post('/store/SubCategory', 'storeSubCate')->name('Sub.cate.store');
        Route::get('/all/SubCategory', 'allSubCategory')->name('allSubCategory');
    });

    // product
    Route::controller(productController::class)->group(function () {
        Route::get('/add/product', 'addProduct')->name('addProduct');
        Route::get('/all/product', 'allProduct')->name('allProduct');
        Route::post('/store/product', 'storeProduct')->name('product.store');
        Route::get('/all/product/{id}', 'productEdit')->name('edit.product');
        Route::post('/update/product', 'productUpdate')->name('product.update');
        Route::get('/delete/product/{id}', 'deleteProduct')->name('product.delete');
    });

    // order  

    Route::get('/pendingOrder', [orderController::class, 'pendingOrder'])->name('pendingOrder');
    Route::get('/ConfirmOrder', [orderController::class, 'ConfirmOrder'])->name('ConfirmOrder');
    Route::get('/viewOrder/{id}', [orderController::class, 'viewOrder']);
    Route::get('updateStatus/{id}', [orderController::class, 'updateOrder']);
    Route::get('/stockProduct', [orderController::class, 'stockProduct'])->name('stockProduct');

    //admin password 

    Route::get('/getPasswordReset', [userController::class, 'passwordReset'])->name('passwordReset');
    Route::Post('/updatePassword', [userController::class, 'updatePassword'])->name('updatePassword');

    // seo page 

    Route::get('/seoAdd', [homeController::class, 'seoAdd'])->name('seoAdd');

    // site system 
    Route::get('/site', [homeController::class, 'siteSystem'])->name('siteSystem');

    // coupon 

    Route::get('/AllCoupon', [homeController::class, 'allCoupon'])->name('allCoupon');
    Route::get('/AddCoupon', [homeController::class, 'addCoupon'])->name('addCoupon');
});

//search 

Route::get('/search', [homeController::class, 'searchData'])->name('search');


// category

// product
