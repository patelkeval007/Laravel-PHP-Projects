<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_Order_Detail extends Model
{
    use Notifiable;
    protected $table = 'sales_order_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','quantity','total','product_id','sales_order_id'
    ];
}
