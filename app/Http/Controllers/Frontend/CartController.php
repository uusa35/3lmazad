<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ad;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $validate = validator($request->all(), [
                'product_id' => 'required',
                'plan_id' => 'required'
            ]
        );
        if ($validate->fails()) {
            return redirect()->route('home')->withErrors($validate);
        }
        $product = Ad::whereId($request->product_id)->first();
        $user = User::whereId(auth()->user()->id)->first();

        $plan = Plan::whereId($request->plan_id)->first();
        session()->put('pay_product_id', $request->product_id);
        session()->put('pay_plan_id', $request->plan_id);

        // cart
        $cart = $this->prepareCart($product, $plan);
        return view('frontend.modules.cart.index', compact('user', 'product', 'plan'));
    }


    public function prepareCart($product, $plan)
    {
        $products = session()->has('cart') ? session()->get('cart') : collect([]);
        $products = $products->reject(function ($value, $key) use ($product) {
            return $value['UnitID'] === $product->id;
        });

        $products->push([
            "CurrencyCode" => config('tap.currencyCode'),
            "ImgUrl" => asset('storage/uploads/images/large/' . $product->image),
            "Quantity" => 1,
            "TotalPrice" => $plan->on_sale ? $plan->sale_price : $plan->price,
            "UnitDesc" => $product->title,
            "UnitID" => $product->id,
            "UnitName" => $product->title,
            "UnitPrice" => $plan->on_sale ? $plan->sale_price : $plan->price,
            "VndID" => ""
        ]);
        $this->setTotalPrice($products);
        session()->put('cart', $products);
        return session()->get('cart');
    }

    public function removeFromCart(Request $request)
    {
        $validate = Validate($request->all(), ['product_id' => 'required']);
        if ($validate->fails()) {
            $this->clearCart();
            return redirect()->home()->with('error', trans('general.cart_error_message'));
        }
        abort_if(!session()->has('cart'), 403, 'no products');
        $products = session()->get('cart');
        $products = $products->reject(function ($value, $key) use ($request) {
            return $value['UnitID'] === $request->product_id;
        });
        session()->put('cart', $products);
        return session()->get('cart');
    }

    public function clearCart()
    {
        session()->forget('cart');
        session()->forget('customer');
        session()->forget('pay_product_id');
        session()->forget('pay_plan_id');
        return redirect()->home();
    }

    public function setTotalPrice($products)
    {
        session()->put('totalPrice', $products->pluck("TotalPrice")->sum());
    }


    public function setCustomer(Request $request)
    {
        session()->put('customer', [
            "Email" => $request->email,
            "Floor" => $request->floor,
            "Gender" => $request->gender,
            "ID" => auth()->user()->id,
            "Mobile" => $request->mobile,
            "Name" => $request->name,
            "Nationality" => $request->nationality,
            "Street" => $request->street,
            "Area" => $request->area,
            "CivilID" => $request->civil_id,
            "Building" => $request->building,
            "Apartment" => $request->appartment,
            "DOB" => $request->dob,
        ]);
        return redirect()->route('checkout.index');
    }
}
