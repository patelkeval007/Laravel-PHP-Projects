<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use Notifiable;

    protected $fillable = [
        'name'
    ];
}
