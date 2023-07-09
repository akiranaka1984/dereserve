<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'email_verify_token',
        'email_verify_status',
        'password',
        'city',
        'profile_pics',
        'role',
        'status',
        'is_admin_verify'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin() {
        return $this->role === 'admin';
    }
 
    
}
