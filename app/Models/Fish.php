<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fish extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
