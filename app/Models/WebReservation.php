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
        'month1','day1','hour1','minut1',
        'month2','day2','hour2','minut2',
        'month3','day3','hour3','minut3',
        'cource',
        'place',
        'pay',
        'contact',
        'cmnt',
        'compatible',
        'status'
    ];

}
