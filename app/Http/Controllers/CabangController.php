<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Models\Office;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index(){
        $data=Office::get();
        $cabang=BranchOffice::with('office', $data)->orderBy('name')->get();
        return view('index', compact('cabang'));
    }
}
