<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    protected $fillable = ["brand_id", "supplier_id", "category_id", "price", "name", "description", "size", "image_path"];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
