<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed status
 * @property mixed created_at
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'status', 'description', 'amount', 'image', 'quantity'];

    public function status()
    {
        return $this->hasOne(Status::class);
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
