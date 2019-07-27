<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cart_Detail extends Model
{
    use Notifiable;
    protected $table = 'cart_details';
    protected $fillable = [
        'quantity','date_add','total','product_id','cart_id'
    ];
}
