<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customers extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    /**
     * basically places in the user table that are assignable or fillable
     * 
    */
    public $fillable=[
        "name",
        "email",
        "password",
        "role_id"
    ];

}
