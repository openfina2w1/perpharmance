<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Userrole;
use App\Interestarea;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::REGISTER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $userrole = Userrole::all();
        $interestarea = Interestarea::all();
        return view('auth.register', compact('userrole', 'interestarea'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'trams_of_conditions_status' => ['required', 'string', 'max:20'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'user_role' => $data['user_role'],
            'password' => Hash::make($data['password']),
            'trams_of_conditions_status' => Hash::make($data['trams_of_conditions_status']),
        ]);
        // {
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'You have registered successfully'
        //     ]);
        // } else{
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Something wrong. Please try again!'
        //     ]);
        // }
    }

    // public function verify($id)
    // {
    //     $password = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
    //     $user = User::findOrFail($id);   
    //     $user->password = Hash::make($password);
    //     $user->active_status = 'Y';
    //     if($user->update()){
    //         $to_name = $user['name'];
    //         $to_email = $user['email'];
    //         $data = array("name" => "Hi ".$to_name.",", "body" => "Congratulations!");
    //         Mail::send('sendmail', $data, function($message) use ($to_name, $to_email){
    //             $message->to($to_email)
    //             ->subject("Verify");
    //         });
    //         return redirect('users')->with('message', 'Verified successfully.'.$password);
    //     } else{
    //         return redirect('users')->with('message', 'Something wrong. Please try again!');
    //     }
    // }

    public function verify(Request $request)
    {
        $user_id = $request->input('user_id');
        $password = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
        $user = User::findOrFail($user_id);   
        $user->password = Hash::make($password);
        $user->active_status = 'Y';
        if($user->update()){
            $to_name = $user['first_name']." ".$user['last_name'];
            $to_email = $user['email'];
            $data = array(
                "name" => "Hi ".$to_name.",",
                "heading" => "",
                "body" => "Congratulations! Your access request was approved. You should now have access to the platform. Please find below your temporary credentials. Once you sign into the platform you will need to reset your password. Username is ".$user['email']." and Password is ".$password
            );
            Mail::send('sendmail', $data, function($message) use ($to_name, $to_email){
                $message->to($to_email)
                ->subject("Approval");
            });
            // return redirect('users')->with('message', 'Verified successfully.'.$password);
            return response()->json([
                'status' => 'success',
                'message' => 'Verified successfully'
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something wrong. Please try again!'
            ]);
            // return redirect('users')->with('message', 'Something wrong. Please try again!');
        }
    }

    public function userreject(Request $request)
    {
        $reject_cause = $request->input('reject_cause');
        $user_id = $request->input('user_id');
        $user = User::findOrFail($user_id);   
        $user->reject_cause = $reject_cause;
        $user->active_status = 'R';
        if($user->update()){
            $to_name = $user['first_name']." ".$user['last_name'];
            $to_email = $user['email'];
            $data = array(
                "name" => "Hi ".$to_name.",", 
                "heading" => "",
                "body" => "We regret to inform you that you are not selected");
            Mail::send('sendmail', $data, function($message) use ($to_name, $to_email){
                $message->to($to_email)
                ->subject("Rejected");
            });
            // return redirect('users')->with('message', 'Verified successfully.'.$password);
            return response()->json([
                'status' => 'success',
                'message' => 'Rejected Successfully!'
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something wrong. Please try again!'
            ]);
            // return redirect('users')->with('message', 'Something wrong. Please try again!');
        }
    }
}
