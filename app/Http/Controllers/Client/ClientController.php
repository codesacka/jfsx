<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Curl\Curl;
use App\Http\Api\Client\Staff;
use App\Http\Api\Client\Branch;
use  App\Http\Api\Client\Client;
use Auth;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         
        
        $curl = new Curl();
        
        $clients =array();
        
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
        
         $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        
        $curl->setOpt(CURLOPT_USERPWD, Auth::user()->username.":".Auth::user()->passwordhash);
        
        $curl->get(\Config::get('server.api_server'). 'clients?tenantIdentifier='.Auth::user()->tenant);

       // $curl->setHeader('Content-Type', 'application/json');
        

        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
            
            
            
            
        } else {
          //  echo 'Response:' . "\n";
           $data= get_object_vars($curl->response);
           
           
           $clients =$data['pageItems'];
          
        }
        

        
        
        return view('clients.index',['clients' =>$clients,'title'=>'Client List']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
         $staff  =new Staff();
        
                  
         $loanstaff =$staff->getStafflist();
         
         $loanofficer = array();
         
         $branchlist  =array();
         
         $loanofficer=[''=>''];
                
                
         foreach($loanstaff as $k){
             if(isset($k->isLoanOfficer)==1){
             $loanofficer[$k->id] =$k->displayName;
             }
         }
        
         $branch  =new Branch();
                 
         $bl =$branch->getBranchlist();
         
       
         $branchlist=[''=>''];
         
          foreach($bl as $k){
          
             $branchlist[$k->id] =$k->name;
             
         }
         
         
         
         $gender =array('' => '','22' => 'Male','24' => 'Female');
        
         return view('clients.create',['title'=>'Create Client','gender'=>$gender,'loanofficer'=>$loanofficer,'branchlist'=>$branchlist,'currendate'=> date('Y-m-d')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //04 May 2017
        $client  =new Client();
       
        $data =array('officeId'=>$request->branch,
                     'submittedOnDate'=>$request->submittedon,
                     'firstname'=>$request->firstname,
                     'lastname'=>$request->lastname,
                     'externalId'=>$request->idnumber,
                     'active' => false, 
                     'locale' => 'en',
                     'dateFormat'=>'dd MMMM yyyy',
                     'mobileNo'=>$request->idnumber,
                     'genderId'=>22,
                     'dateOfBirth'=>$request->dateofbirth,
                     'staffId' =>$request->loanofficer,
                    );
        
        
       $result = $client->newclient($data);
        
        
       if(isset($result['resourceId'])> 0){
           
           return redirect()->route('Client.show',$result['resourceId'])
                        ->with('success','Client  created successfully');
       }else{
           
           return redirect()->route('Client.create')
                        ->with('error','Error Occured on Client Creation');
       }
           
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        
          $staff  =new Staff();
        
                  
         $loanstaff =$staff->getStafflist();
         
         $loanofficer = array();
         
         $branchlist  =array();
         
         $loanofficer=[''=>''];
                
                
         foreach($loanstaff as $k){
             if(isset($k->isLoanOfficer)==1){
             $loanofficer[$k->id] =$k->displayName;
             }
         }
        
         $branch  =new Branch();
                 
         $bl =$branch->getBranchlist();
         
       
         $branchlist=[''=>''];
         
          foreach($bl as $k){
          
             $branchlist[$k->id] =$k->name;
             
         }
         
         
         
        $gender =array('' => '','22' => 'Male','24' => 'Female');
         
         
         
        
        $client  =new Client();
        
        $client_result = $client->getClientdetails($id);
       
        //  print_r($result);
        
        
      return view('clients.show',['title'=>'Update Client Details','client_result'=> $client_result,'gender'=>$gender,'loanofficer'=>$loanofficer,'branchlist'=>$branchlist,'currendate'=> date('Y-m-d')]);  
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
