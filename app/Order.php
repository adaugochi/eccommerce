<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed phone_number
 * @property mixed street_number
 * @property mixed street_name
 * @property mixed city
 * @property mixed cart
 * @property mixed state
 * @property mixed status
 * @property mixed country
 * @property mixed payment_id
 */
class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name', 'phone_number', 'city', 'street_number', 'street_name', 'country', 'state'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAddress()
    {
        return $this->street_number.', '.$this->street_name.', '.$this->city.', '.$this->state.' '.$this->country.'.';
    }
}
