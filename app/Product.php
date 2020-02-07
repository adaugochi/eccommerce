<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed status
 * @property mixed created_at
 * @property mixed title
 * @property mixed description
 * @property string|null image
 * @property mixed amount
 * @property mixed quantity
 * @property int created_by
 * @property string currency
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'status', 'description', 'currency', 'amount', 'image', 'quantity'];

    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function currency()
    {
        return $this->hasOne(Currency::class);
    }

    public function convertSlugToText()
    {
        $text = str_replace("-", " ", $this->status);
        return ucwords($text);
    }

    public function getAttributeCreatedAt()
    {
        return date('M d, Y h:i A', strtotime($this->created_at));
    }

}
