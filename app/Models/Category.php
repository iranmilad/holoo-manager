<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(Users::class, 'users_id');
    }

    public function subCategory()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}
