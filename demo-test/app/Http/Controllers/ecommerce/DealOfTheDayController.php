<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Carbon\Carbon;

class DealOfTheDayController extends Controller
{
    //

    public function getDealOfTheDay()
    {
        $deals = Discount::with([
                'product' => function ($query) {
                    $query->with('productImage', 'reviews');
                }
            ])
            ->active() // Assuming the `scopeActive` is defined in the `Discount` model
            ->where('enddate', '>', Carbon::now()) // Exclude expired discounts
            ->inRandomOrder() // Fetch random products
            ->limit(1) // Limit to one deal
            ->get();

        return view('ecommerce.home', compact('deals'));
    }
}
