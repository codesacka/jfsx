<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Api\Client;

/**
 * Description of Staff
 *
 * @author koskei
 */
use \Curl\Curl;
use Auth;

class Staff {
    //put your code here
    
    
     public function getStafflist(){
        
         $curl = new Curl();
        
        $clients =array();
        
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
        
         $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        
        $curl->setOpt(CURLOPT_USERPWD, Auth::user()->username.":".Auth::user()->passwordhash);
        
        $curl->get(\Config::get('server.api_server'). 'staff?tenantIdentifier='.Auth::user()->tenant);

       // $curl->setHeader('Content-Type', 'application/json');
        

        if ($curl->error) {
         //   echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
            
           return -1; 
            
            
        } else {
          // echo 'Response:' . "\n";
           
            $data =$curl->response;
            
            return $data;
          // $data= get_object_vars($curl->response);
           
        }
        
        
    }
}
