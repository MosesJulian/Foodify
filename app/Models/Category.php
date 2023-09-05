<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function food() {
        return $this->hasOne(Food::class, 'category_id', 'id');
    }
    // use HasFactory;
    protected $fillable = ['name'];
}
