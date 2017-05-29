<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Api\Client;

/**
 * Description of Client
 *
 * @author koskei
 */

use \Curl\Curl;
use Auth;
class Client {
    //put your code here
    
    
    
    public function newclient($data=array()){
        
        
        
      //  $data = array("name" => "Hagrid", "age" => "36");                                                                    
        $data_string = json_encode($data);                                                                                   
        $ch = curl_init(\Config::get('server.api_server'). 'clients?tenantIdentifier='.Auth::user()->tenant);                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_USERPWD, Auth::user()->username.":".Auth::user()->passwordhash);     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
        $result = curl_exec($ch);
           
       // print_r($result);
        
        
     return get_object_vars(json_decode($result));
       
    }
    
    public function getClientdetails($id){
   
            $ch = curl_init();

            // Set query data here with the URL
            curl_setopt($ch, CURLOPT_URL, \Config::get('server.api_server')."clients/".$id."?tenantIdentifier=".Auth::user()->tenant); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERPWD, Auth::user()->username.":".Auth::user()->passwordhash);     
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);       
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $content = trim(curl_exec($ch));
            curl_close($ch);
        
        return json_decode($content);
        
        
    }
    
    
}
