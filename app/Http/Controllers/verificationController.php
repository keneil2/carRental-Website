<?php

namespace App\Http\Controllers;

use App\Models\Varification_codes;
use Illuminate\Http\Request;

class verificationController extends Controller
{
    public function sendEmail(){
   $code=$this->VarCode();
   Varification_codes::create([
    "code"=>$code,
    "user_id"=> session()->get("userId")
   ]);
    }

    private function VarCode()
    {
      $code = mt_rand(10000000, 1000000000);
     return $code;
    }
  
}
