<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index() {
        // store the deal and make it not valid + create refrence_id

        // go to payment route

        // then wait for the response then change the validity to true if success
        return 'from inside checkout index';
    }
}
