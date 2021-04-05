<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Food extends Model
{
    use HasFactory;
    protected $fillable=['category_id','name','description','price'];

    public function relCategory()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
