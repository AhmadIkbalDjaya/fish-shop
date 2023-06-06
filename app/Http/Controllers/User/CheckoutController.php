<?php

namespace App\Http\Controllers\User;

use DateTime;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Fish;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth()->user()->id)->get();
        $total_price = 0;
        $total_fish = 0;

        foreach ($carts as $cart) {
            $total_fish ++;
            $total_price += $cart->fish->price;
        }
        return view("user.checkout", [
            "title" => "Checkout",
            "carts" => $carts,
            "total_fish" => $total_fish,
            "total_price" => $total_price,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "fishs_id" => "required",
            "name" => "required|string",
            "phone" => "required|numeric",
            "address" => "required|string",
            "payment" => "required|numeric|in:1,2,3,4",
            "total" => "required|numeric",
        ]);
        $validated["user_id"] = Auth()->user()->id;
        $validated["buy_date"] = Carbon::now()->format('Y-m-d');
        $carts = $request->carts;
        foreach ($carts as $cart) {
            Cart::where('id', $cart)->delete();
        }
        $validated['fishs_id'] = json_encode($validated["fishs_id"]);
        $order = Order::create($validated);
        
        return redirect()->route('confirmPay', ['order' => $order->id])->with("success", "Checkout berhasil");
    }

    public function confirmPayment(Order $order)
    {
        return view("user.comfirmPayment", [
            "title" => "Konfirmasi Pembayaran",
            "order" => $order,
        ]);
    }

    public function success()
    {
        return view("user.succes", [
            "title" => "Success",
        ]);
    }
}
