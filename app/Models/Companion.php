<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    protected $table = 'companions';

    protected $fillable = [
        'name',
        'kana',
        'age',
        'height',
        'bust',
        'cup',
        'waist',
        'hip',
        'rookie',
        'hobby',
        'sale_point',
        'font_color',
        'message',
        'entry_date',
        'category_id',
        'celebrities_who_look_alike',
        'position',
        'status'
    ];

    public function category(){
    	return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function home_image(){
    	return $this->hasOne('App\Models\CompanionPhoto','companion_id','id')->where('photo_setting_id','=',1);
    }

    public function all_images(){
    	return $this->hasMany('App\Models\CompanionPhoto','companion_id','id');
    }

}
