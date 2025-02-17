<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    use HasFactory;

    protected $table = 'photo_categories';

    protected $fillable = [
        'name',
        'position',
        'status'
    ];

}
