<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admins extends Authenticatable
{
    // use AuthenticatesUsers;
    use HasFactory;
//     public function getAuthPassword()
// {
//     return $this->pwd;
// }
    
}
