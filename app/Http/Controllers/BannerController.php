<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\View\View;

class BannerController extends Controller
{
    public function index(): View{
        $banners=Banner::where('active', '=', 1)->get();
        return view('index', compact('banners'));
    }
}
