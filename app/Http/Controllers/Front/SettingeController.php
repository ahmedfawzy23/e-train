<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Settinge;

class SettingeController extends Controller
{
    public function index(){
        $data['settings'] = Settinge::first();
        return view('front.contact.index')->with($data);
    }
}
