<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $brand_id
 * @property int $supplier_id
 * @property int $category_id
 * @property string $price
 * @property string $name
 * @property string $description
 * @property int $size
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Supplier $supplier
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Watch whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Watch extends Model
{
    protected $fillable = ["brand_id", "supplier_id", "category_id", "price", "name", "description", "image_path"];

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

    public function basket()
    {
        return $this->hasMany(BasketItem::class);
    }
}
