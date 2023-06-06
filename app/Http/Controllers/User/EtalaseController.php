<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Fish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EtalaseController extends Controller
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
        return view("user.etalase", [
            "title" => "Fish Shop",
            "fishs" => Fish::all(),
            "carts" => $carts,
            "total_fish" => $total_fish,
            "total_price" => $total_price,
        ]);
    }

    public function addCart(Request $request)
    {
        $validated = $request->validate([
            "fish_id" => "required|exists:fish,id",
        ]);
        $validated["user_id"] = Auth()->user()->id;
        Cart::create($validated);
        if ($request->checkout) {
            return redirect()->route('checkout')->with("success", "item berhasil ditambahkan ke keranjang");
        } else {
            return back()->with("success", "item berhasil ditambahkan ke keranjang");
        }
    }

    public function destroyCart(Cart $cart)
    {
        $cart->delete();
        return back()->with("success", "Item berhasil di hapus dari cart");
    }
}
