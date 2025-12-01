<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WatchOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WatchOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WatchOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WatchOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WatchOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WatchOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WatchOrder extends Model
{
    protected $fillable = ["user_id", "watch_id", "shipping_address_id", "card_id", "status", "size", "quantity"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function watch()
    {
        return $this->belongsTo(Watch::class);
    }

    public function shipping_address()
    {
        return $this->belongsTo(Address::class, "shipping_address_id");
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
