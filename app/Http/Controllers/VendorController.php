<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;


class VendorController extends Controller
{
    public function VendorDashboard(){
        return view('vendor.vendor_dashboard');
    }

    public function Vendorlogin(){
        return view('vendor.vendor_login');
    }


    public function VendorDestroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/vendor/login');
    }
}
