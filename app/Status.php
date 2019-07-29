<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = ['key', 'name'];

    const IN_STOCK = 'in-stock';
    const OUT_STOCK = 'out-stock';
    const PENDING = 'pending';
    const DELIVERED = 'delivered';

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
