<?php

namespace App\Http\Controllers\User;

use DateTime;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;

class CheckoutController extends Controller
{
    public function index()
    {
        return view("user.checkout", [
            "title" => "Checkout",
            "carts" => Cart::where("user_id", "1")->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "fishs_id" => "required",
            "name" => "required|string",
            "phone" => "required|number",
            "address" => "required|string",
            "payment" => "required|number|in:1,2,3,4",
            "total" => "required|number",
        ]);
        $validated["user_id"] = "1";
        $validated["buy_date"] = new Date();
        Order::create($validated);
        return redirect()->with("success", "Checkout berhasil");
    }
}
