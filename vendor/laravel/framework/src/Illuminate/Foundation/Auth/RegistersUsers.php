<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        // return $this->registered($request, $user)
                        // ?: redirect($this->redirectPath());
        
        $to_name = $user['first_name']." ".$user['last_name'];
        $to_email = $user['email'];
        $data = array(
            "name" => "Hi ".$to_name.",", 
            "heading" => "Thanks for signing up!",
            "body" => "An administrator is currently reviewing your request. Please check your email for a status update on your access permissions in the next 48-72 hours. In the meantime please read more about our platform here [inset link]"
        );
        Mail::send('sendmail', $data, function($message) use ($to_name, $to_email){
            $message->to($to_email)
            ->subject("Thanks for signing up!");
        });

        return response()->json([
            'status' => 'success',
            'message' => 'You have registered successfully'
        ]);
        
        // return redirect('register')->with('message', 'Congratulations! You have successfully registered.');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
