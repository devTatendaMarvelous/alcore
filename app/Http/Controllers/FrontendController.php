<?php

namespace App\Http\Controllers;

use App\Models\Gadget;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $gadgets=Gadget::where('is_forsale',1)->get();
        return view('products')->with('gadgets',$gadgets);
    }
}
