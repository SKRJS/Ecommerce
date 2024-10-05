<?php

namespace App\Models;

use App\Models\catagory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function catagory()
    {
        return $this->belongsTo(catagory::class);
    }
}
