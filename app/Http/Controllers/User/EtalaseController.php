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
        return view("user.etalase", [
            "title" => "Fish Shop",
            "fishs" => Fish::all(),
            "carts" => Cart::where('user_id', "1")->get(),
        ]);
    }

    public function addCart(Request $request)
    {
        $validated = $request->validate([
            "fish_id" => "required|exists:fishs,id",
        ]);
        $validated["user_id"] = "1";
        Cart::create($validated);
        if ($request->checkout) {
            return redirect()->route('user.checkout')->with("success", "item berhasil ditambahkan ke keranjang");
        } else {
            return back()->with("success", "item berhasil ditambahkan ke keranjang");
        }
    }
}
