<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    //
    public function index()
    {
        return view('ecommerce.privacy-policy');
    }
}
