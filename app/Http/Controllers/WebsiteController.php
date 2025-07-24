<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function show($id){
        $package = TravelPackage::find($id);
        return view('website.pages.travel_packages.index',compact('package'));
    }
}
