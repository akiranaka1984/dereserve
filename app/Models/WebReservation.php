<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebReservation extends Model
{
    use HasFactory;

    protected $table = 'web_reservations';

    protected $fillable = [
        'user_id',
        'name',
        'mail',
        'tel',
        'lineid',
        'lady1','lady2','lady3',
        'date1',
        'date2',
        'date3',
        'cource',
        'place',
        'pay',
        'contact',
        'cmnt',
        'compatible',
        'status'
    ];

}
