<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function catagory_item()
    {
        return $this->belongsTo(catagory::class, 'category_id', 'id');
    }


    public function subCate_item()
    {
        return $this->belongsTo(subCategory::class, 'sub_id', 'id');
    }
}
