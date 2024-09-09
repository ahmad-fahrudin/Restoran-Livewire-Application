<?php

namespace App\Models;

use App\Models\Foods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function foods()
    {
        return $this->hasMany(Foods::class);
    }
}
