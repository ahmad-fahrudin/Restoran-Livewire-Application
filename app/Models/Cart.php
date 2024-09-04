<?php

namespace App\Models;

use App\Models\User;
use App\Models\Foods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function foods()
    {
        return $this->belongsTo(Foods::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
