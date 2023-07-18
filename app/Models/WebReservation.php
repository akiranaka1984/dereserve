<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebReservation extends Model
{
    use HasFactory;

    protected $table = 'web_reservations';

    protected $fillable = [
        'name',
        'mail',
        'tel',
        'content',
        'compatible',
        'status'
    ];

}
