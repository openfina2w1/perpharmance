<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userrole;
use App\Http\Requests\DynamicAddUserRequest;
use App\Http\Requests\UsersRequest;
use App\Tempuser;
use App\User;
use App\RegistrationLinks;
use App\Maillog;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DynamicRegisterController extends Controller
{
    public function index($token = null)
    {        
        $reg_link_data = RegistrationLinks::where('token', $token)->first();
        if(gettype($reg_link_data) == 'object' && $reg_link_data['active_status'] == 'N'){
            return view('auth.link_expired');
        } else{
            $userrole = Userrole::all();
            $temp_users = Tempuser::where('refer_code', $token)->get();
            return view('auth.dynamicregister', compact('userrole', 'temp_users', 'token'));
        }
    }

    public function adduser(DynamicAddUserRequest $request){
        $validateData = $request->validated();

        $temp_users = Tempuser::where('refer_code', $validateData['token'])->get();
        if(count($temp_users) > 24){
            return response()->json([
                'status' => 'error',
                'message' => "You can't add more than 25 users at a time"
            ]);
        } else{
            $user = new Tempuser;
            $user->first_name = $validateData['first_name'];
            $user->last_name = $validateData['last_name'];
            $user->email = $validateData['email'];
            $user->contact_number = $validateData['contact_number'];
            $user->user_role = $validateData['user_role'];
            $user->company_name = $validateData['company_name'];
            $user->company_address = $validateData['company_address'];
            $user->zip_code = $validateData['zip_code'];
            $user->refer_code = $validateData['token'];
            if($user->save()){       
                $data = $this->get_all_temp_users($validateData['token']); 
                return response()->json([
                    'status' => 'success',
                    'message' => 'User added successfully',
                    "data" => $data
                ]);
            } else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something wrong. Please try again!'
                ]);
            }
        }
    }

    public function get_all_temp_users($token){
        $temp_users = Tempuser::where('refer_code', $token)->get();

        $html = "";
        if(count($temp_users) > 0){
            $html .= "<div class='row'>
                <div class='col-md-12 grid-margin'>
                    <div class='card'>
                        <div class='card-body'>
                            <table class='table table-boarded table-striped'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Role</th>
                                        <th>Company Name</th>
                                        <th>Company Address</th>
                                        <th>Zip Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tboby>";
                                    foreach($temp_users as $users){
                                        
                                    $contact_arr = str_split($users->contact_number);
                                    $html .= "<tr>
                                            <td>".$users->first_name." ".$users->last_name."</td>
                                            <td>".$users->email."</td>
                                            <td>".$contact_arr[0].$contact_arr[1]."-".$contact_arr[2].$contact_arr[3].$contact_arr[4]."-".$contact_arr[5].$contact_arr[6].$contact_arr[7]."-".$contact_arr[8].$contact_arr[9].$contact_arr[10].$contact_arr[11]."</td>
                                            <td>".$users->user_role."</td>
                                            <td>".$users->company_name."</td>
                                            <td>".$users->company_address."</td>
                                            <td>".$users->zip_code."</td>
                                            <td>
                                                <a class='btn btn-danger text-white temp_user_delete tempdel".$users->id."' data-id='".$users->id."' data-url='".url('delete-temp-user')."' data-token='".$token."'>Delete</a>
                                            </td>
                                        </tr>";
                                    }
                                    $html .= "</tboby>
                            </table>
                            <div class='form-button mb-4 d-flex justify-content-end position-relative'>
                                <div class='d-flex align-items-center justify-content-center me-3'>
                                    <input type='checkbox' class='form-check-input me-2 mt-0 @error('trams_of_conditions_status') is-invalid @enderror' id='trams_of_conditions_status' name='trams_of_conditions_status'>
                                    <label class='form-check-label' for='trams_of_conditions_status'>Disclaimer & Terms and conditions</label>
                                </div> 
                                <div class='form-button required-field'>
                                    <div class='invalid-feedback' role='alert'>
                                        <strong class='trams_of_conditions_status_error error_cls'></strong>
                                    </div>  
                                </div> 
                                <button type='button' class='btn primaray-btn submit_user_btn'>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        return $html;
    }

    public function submituser(Request $request){
        $temp_users = Tempuser::where('refer_code', $request['token'])->get();
        $success_cnt = 0;
        $password = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
        foreach($temp_users as $user){
            $reg_link_data = RegistrationLinks::where('token', $user['refer_code'])->first();
            $registration_link = RegistrationLinks::findOrFail($reg_link_data['id']);  
            if(User::create([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'user_role' => $user['user_role'],
                'contact_number' => $user['contact_number'],
                'company_name' => $user['company_name'],
                'company_address' => $user['company_address'],
                'zip_code' => $user['zip_code'], 
                'trams_of_conditions_status' => $request['trams_of_conditions_status'],
                'password' => Hash::make($password)
            ])){
      
                $tmp_user_data = Tempuser::findOrFail($user['id']); 
                $tmp_user_data->password = $password;
                $tmp_user_data->update();

                $registration_link->active_status = 'N';
                $registration_link->update();                
                $success_cnt++;
            }
        }        

        if($success_cnt > 0){
            return response()->json([
                'status' => 'success',
                'message' => 'Your request has been successfully submitted',
                'data' => ''
            ]);
        }
    }

    public function regsuccess($token = null)
    {        
        return view('auth.success', compact('token'));
    }

    public function sendmail(Request $request){
        $temp_users = Tempuser::where('refer_code', $request['token'])->get();
        foreach($temp_users as $user){
            $status = "";
            $to_name = $user['first_name']." ".$user['last_name'];
            $to_email = $user['email'];
            $data = array(
                "name" => "Hi ".$to_name.",", 
                "heading" => "Thanks for signing up!",
                "body" => "",
                "username" => "Username - ".$user['email'],
                "password" => "Password - ".$user['password'],
            );

            try{
                Mail::send('sendmail', $data, function($message) use ($to_name, $to_email){
                    $message->to($to_email)
                    ->subject("Thanks for signing up!");
                });              

                $status = "Sent";
            } catch(\Exception $err){
                echo $err;
                $status = "Failed";
            }

            Maillog::create([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'mail_type' => "Registration",
                'mail_status' => $status,
            ]);

            Tempuser::where('id', $user['id'])->delete();
        }
    }

    public function deleteuser(Request $request){
        if($request['temp_user_id']){
            Tempuser::where('id', $request['temp_user_id'])->delete();
            $data = $this->get_all_temp_users($request['token']); 
            return response()->json([
                'status' => 'success',
                'message' => 'User has been deleted successfully',
                "data" => $data
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something wrong. Please try again!'
            ]);
        }
    }

    public function user_update(Request $request){
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);   
        
        $user->first_name = $request['first_name'];
        $user->middle_name = $request['middle_name'];
        $user->last_name = $request['last_name'];
        $user->contact_number = $request['contact_number'];
        $user->company_address = $request['company_address'];
        $user->zip_code = $request['zip_code'];
        $user->state = $request['state'];
        $user->country = $request['country'];
        $user->user_role = $request['user_role'];
        $user->department = $request['department'];
        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/profile/', $fileName);
            $user->profile_image = $fileName;
        }
        if($user->update()){
            return response()->json([
                'status' => 'success',
                'message' => 'Profile has been updated successfully',
                'data' => Auth::user()
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something wrong. Please try again1!'
            ]);
        }
    }
    
}
