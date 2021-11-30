<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class password_reset extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable =[
        'email',
        'token'
    ];

    //public function setTokenAttribute($token){
    //    $this->attributes['token'] = bcrypt($token);
    //}
}
