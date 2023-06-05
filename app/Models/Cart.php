<?php

namespace App\Models;

use App\Models\Fish;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }
}
