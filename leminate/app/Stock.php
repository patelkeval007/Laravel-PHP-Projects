<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Notifiable;
    protected $table = 'stocks';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','purchase','sales','available','product_id'
    ];
}
