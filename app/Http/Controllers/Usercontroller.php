<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class Usercontroller extends Controller{

    // Login field officer
    public function Authenticate(Request $req){
      $data = array('Email' =>$req->username ,'Password'=>$req->pass );
      $response = Http::post('https://www.mra.mw/sandbox/programming/challenge/webservice/auth/login',$data);
      $token = $response['Remark'];

      if($token !="Successful"){
      Session::flash('message', "Wrong Username OR Password!");
      return redirect('/');

        }else{

            $value=$response['Token']['Value'];
            $email = $response['UserDetails']['email'];
            $firstname = $response['UserDetails']['FirstName'];
            $lastname = $response['UserDetails']['LastName'];
            session()->put('Token',$value);
            session()->put('email',$email);
            session()->put('firstname',$firstname);
            session()->put('lastname',$lastname);

            session()->put("user","true");
            
            Session::flash('message', "Welcome back !!");
            return redirect("showall");
        }

    }

    // List of taxpayers
    public function gettaxpayer(){
        $value = session()->get("Token");
        $email = session()->get("email");
        $client = new Client(['base_uri' => 'https://www.mra.mw/sandbox/']);
        $response = $client->get('programming/challenge/webservice/Taxpayers/getAll', [
            'headers' => [
                'Accept'=>'*/*',
                'Connection'=>'keep-alive',
                'Accept-Encoding'=>'gzip, deflate, br',
                'Content-Type' => 'application/Json',
                'candidateid' => $email,
                'apikey'=>'3fdb48c5-336b-47f9-87e4-ae73b8036a1c',

            ]]);
            $content= json_decode($response->getBody()->getContents());
            $output = "";
            $output2 = "Error getting tax payers";
            $count = 1;
            foreach ($content as $key => $value){
                $output.="
                <tr>
                    <td>".$count++."</td>
                    <td>".$value->TPIN."</td>
                    <td>".$value->BusinessCertificateNumber."</td>
                    <td>".$value->TradingName."</td>
                    <td>".$value->BusinessRegistrationDate."</td>
                    <td>".$value->MobileNumber." <br>".$value->Email."</td>
                    <td>".$value->PhysicalLocation."</td>
                    <td>
                     <a href='edit/".$value->TPIN."' class='btn btn-sm btn-outline-info'>
                     <i class='fa fa-edit'></i> Edit</a>
                     <a href='delete/".$value->TPIN."' class='btn btn-sm btn-outline-danger'> 
                     <i class='fa fa-times-circle'></i> Delete</a> 
                    </td> 
                </tr> ";
                 }
              $statuscode = $response->getStatusCode();
              if ($statuscode == 200) {
                print_r($output);
               }elseif($statuscode == 500) {
                print_r($output2);
            }else{
                print_r($output2);
            }

                    
    }


    // Add new tax payer
    public function putdata(Request $req){
        
        $data = array(

            'Email' =>$req->email ,
            'TPIN'=>$req->TPIN , 
            'BusinessCertificateNumber'=>$req->BusinessCertificateNumber,
            'TradingName'=>$req->TradingName , 
            'BusinessRegistrationDate'=>$req->BusinessRegistrationDate,
            'MobileNumber'=>$req->MobileNumber,
            'PhysicalLocation'=>$req->PhysicalLocation,
            'Username'=>$req->Username 
         );

         $value = session()->get("Token");
         $email = session()->get("email");
         $response = Http::withHeaders( [
      
        'Accept'=>'*/*',
        'Connection'=>'keep-alive',
        'Accept-Encoding'=>'gzip, deflate, br',
        'Content-Type' => 'application/Json',
        'candidateid' => $email,
        'apikey'=>'3fdb48c5-336b-47f9-87e4-ae73b8036a1c',

       ])->post('https://www.mra.mw/sandbox/programming/challenge/webservice/Taxpayers/add',$data);
           
     $statuscode=$response->getStatusCode();
     if ($statuscode == 200) {
         Session::flash('putdata', "Adding Tax Payer Successful");
       }elseif ($statuscode == 300) {
        Session::flash('putdata', "Ambiguous (Tax Payer already exists)'");
      }elseif ($statuscode == 400) {
        Session::flash('putdata', " Bad request (Invalid Request, Username does not exist)");
     }elseif ($statuscode == 500) {
        Session::flash('putdata', "Internal Server Error");
     }else{
        Session::flash('putdata', "Error");
    }

        return view('add');
        
    }

    // Edit tax Payer
   public function Edit(Request $req){
        
        $data = array(
            'Email' =>$req->email ,
            'TPIN'=>$req->TPIN , 
            'BusinessCertificateNumber'=>$req->BusinessCertificateNumber,
            'TradingName'=>$req->TradingName , 
            'BusinessRegistrationDate'=>$req->BusinessRegistrationDate,
            'MobileNumber'=>$req->MobileNumber,
            'PhysicalLocation'=>$req->PhysicalLocation,
            'Username'=>$req->Username,
        );
        
        $value = session()->get("Token");
        $email = session()->get("email");
        $response = Http::withHeaders( [
      
        'Accept'=>'*/*',
        'Connection'=>'keep-alive',
        'Accept-Encoding'=>'gzip, deflate, br',
        'Content-Type' => 'application/Json',
        'candidateid' => $email,
        'apikey'=>'3fdb48c5-336b-47f9-87e4-ae73b8036a1c',
            ])->post('https://www.mra.mw/sandbox/programming/challenge/webservice/Taxpayers/edit',$data);
           
        $statuscode=$response->getStatusCode();
        //$token = $response['ResultCode'];
          if ($statuscode == 200) {
                Session::flash('edit', " Updating TaxPayer successfull");
            }elseif ($statuscode == 400) {
                Session::flash('edit', "Bad request (Invalid Request, Username does not exist)");
            }elseif ($statuscode == 300 ) {
                Session::flash('edit', "Ambiguous (Taxpayer already exists)");
            }elseif($statuscode == 500){
                Session::flash('edit', " Internal Server Error");
            }else{
                Session::flash('edit', "Error Editing");
            }
         return view('Showall');
   }

    // Delete a taxpayer
    public function delete($tpin){
       $data = array("TPIN"=>$tpin);
       $value = session()->get("Token");
       $email = session()->get("email");
       $response = Http::withHeaders( [
        'Accept'=>'*/*',
        'Connection'=>'keep-alive',
        'Accept-Encoding'=>'gzip, deflate, br',
        'Content-Type' => 'application/Json',
        'candidateid' => $email,
        'apikey'=>'3fdb48c5-336b-47f9-87e4-ae73b8036a1c',
        ])->post('https://www.mra.mw/sandbox/programming/challenge/webservice/Taxpayers/delete',$data);
    
      $statuscode=$response->getStatusCode();
      if ($statuscode == 200) {
            Session::flash('edit', "Deleting Tax Payer Deleted Successfull");
        }elseif ($statuscode == 400) {
            Session::flash('edit', "  Error deleting Tax Payer : Error");
        }else{
            Session::flash('edit', "  Error deleting Tax Payer : Error");
        }
        
        return redirect('showall');
    }

    // Logging out field officer.
    public function logout(){
       $email = session()->get("email");
       $data = array("Email"=>$email);
       $response = Http::post('https://www.mra.mw/sandbox/programming/challenge/webservice/auth/logout', $data);

      $token = $response['ResultCode'];
      if ($token == 1) {
            Session::flash('logoutt', "Logout Successfull");
            session()->forget('email');
            session()->forget('Token');
            session()->forget('user');
           return redirect('/');
        }else{
            Session::flash('logoutt', "  Error Logging out");
        }

    } 

  // Populate Edit form
    public function getedit($tpin){
        $value = session()->get("Token");
        $email = session()->get("email");
        $client = new Client(['base_uri' => 'https://www.mra.mw/sandbox/']);
        $response = $client->get('programming/challenge/webservice/Taxpayers/getAll', [
        'headers' => [
        
        'Accept'=>'*/*',
        'Connection'=>'keep-alive',
        'Accept-Encoding'=>'gzip, deflate, br',
        'Content-Type' => 'application/Json',
        'candidateid' => $email,
        'apikey'=>'3fdb48c5-336b-47f9-87e4-ae73b8036a1c',
    ]]);
    $content= json_decode($response->getBody()->getContents());
            foreach ($content as $key => $value) {
                if($tpin == $value->TPIN){
                  $values[]=   $value;
            }}
            return view('Edit',compact('values'));       
          }
}