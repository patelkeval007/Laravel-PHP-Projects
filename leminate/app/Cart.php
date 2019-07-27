<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Notifiable;
    protected $table = 'carts';
    protected $fillable = [
        'user_id','status'
    ];
}
