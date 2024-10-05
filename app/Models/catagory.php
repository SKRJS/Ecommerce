<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subCategory;

class catagory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategories()
    {
        return $this->hasMany(subCategory::class, 'category_id');
    }
}
