<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Sales_Order extends Model
{
    use Notifiable;
    protected $table = 'sales_orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','address','date','status','user_id'
    ];
}
