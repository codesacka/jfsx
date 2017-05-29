<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Plugins\Hash_encryption;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    


    
public static function encryptstuff($hashkey,$data)
{
  $encrypted = $hashkey->encrypt($data);

   return $encrypted;
}
//function to decrypt stuff
public static function decrypt($hashkey,$data)
    {
    return ($hashkey->decrypt($data));


    }
    
 public static function encryptuserid($str,$salt)
    {
        $hashkey =new Hash_encryption($salt);
        return self::encryptstuff($hashkey,$username);
      }

 public static function decryptuserid($str,$salt)
 {
   $hashkey =new Hash_encryption($salt);
   return self::decrypt($hashkey,$username);
 }

}
