<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productdetails;
use App\Usersessionscomments;
use App\Selfanalyzeusersession;
use DateTime;
use Session;
use Illuminate\Support\Facades\Auth;

class SelfanalyzeController extends Controller
{
    function index() {
        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        $sidebar = "default-sidebar";
        $page_name = "self_analyze";
        return view('admin.selfanalyze.slafanalyze', compact('sidebar', 'productdetails', 'page_name'));
    }

    function self_analyze() {
        // $comments = "";
        // if(Session::get('user_self_analyze_session_id') == ""){
        //     Session::put('user_self_analyze_session_id', now()->getTimestampMs());
        // } else{
        //     $user_self_analyze_session_id = Session::get('user_self_analyze_session_id');
        //     $comments = Usersessionscomments::where('session_id', $user_self_analyze_session_id)->get();
        // }

        $page_name = "self_analyze";
        Session::pull('user_self_analyze_session_id');
        Session::put('user_self_analyze_session_id', now()->getTimestampMs());
        $user_self_analyze_session_id = Session::get('user_self_analyze_session_id');
        $comments = Usersessionscomments::where('session_id', $user_self_analyze_session_id)->get();

        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        $sidebar = "self-analyze-sidebar";
        $self_analyze_user_session = null;
        $session_id = "";
        return view('admin.selfanalyze.selfanalyzedetails', compact('sidebar','productdetails', 'comments', 'self_analyze_user_session', 'session_id', 'page_name'));
    }

    function self_analyze_by_session($user_self_analyze_session_id){
        $session_id = $user_self_analyze_session_id;
        Session::put('user_self_analyze_session_id', $user_self_analyze_session_id);
        $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
        $sidebar = "self-analyze-sidebar";
        $self_analyze_user_session = Selfanalyzeusersession::where('session_id', $user_self_analyze_session_id)->first();
        $comments = Usersessionscomments::where('session_id', $user_self_analyze_session_id)->get();
        return view('admin.selfanalyze.selfanalyzedetails', compact('sidebar','productdetails', 'comments', 'self_analyze_user_session', 'session_id'));
    }

    function user_session_comment_save(Request $request) {
        $user_self_analyze_session_id = Session::get('user_self_analyze_session_id');
        if(Usersessionscomments::create([
            'session_id' => $user_self_analyze_session_id,
            'comment' => $request['comment'],
        ])){
            $data = $this->get_all_comment_by_session($user_self_analyze_session_id);
            return response()->json([
                'status' => 'success',
                'message' => 'Comment added successfully.',
                'data' => $data
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something wrong. Please try again!'
            ]);
        }
    }

    public function get_all_comment_by_session($user_self_analyze_session_id){
        $comments = Usersessionscomments::where('session_id', $user_self_analyze_session_id)->orderBy('created_at', 'DESC')->get();

        $html = "";
        if(count($comments) > 0){
            $html .= "<div class='row'  style='height: 205px; overflow: auto'>
                <div class='col-md-12 comment-section'>
                    <div class='comment-store'>
                        <div class='form-group'>
                            <label for='date'><strong>Date </strong></label>
                            <p> Comment</p>
                        </div>
                    </div>";
                    foreach($comments as $comment){
                        $html .= "<div class='comment-store'>
                            <div class='form-group'>
                                <label for='date1'><strong>".$comment->created_at."</strong></label>
                                <p>".$comment->comment."</p>
                            </div>
                        </div>";
                    }
                $html .= "</div>
            </div>
            ";
        }
        return $html;
    }

    function save_user_session(Request $request) {
        $user_self_analyze_session_id = Session::get('user_self_analyze_session_id');
        $session_data = Selfanalyzeusersession::where('session_id', $user_self_analyze_session_id)->count();
        // echo $user_id = Auth::id();exit;
        if($session_data > 0){
            $session_data = Selfanalyzeusersession::where('session_id', $user_self_analyze_session_id)->first();
            $session = Selfanalyzeusersession::findOrFail($session_data['id']);
            $session->session_id = $user_self_analyze_session_id;
            $session->filter_data = $request['filter_obj'];
            $session->session_name = $request['session_name'];
            $session->updated_by = Auth::id();;
            if($session->update()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Session updated successfully.'
                ]);
            } else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something wrong. Please try again!'
                ]);
            }
        } else{
            if(Selfanalyzeusersession::create([
                'session_id' => $user_self_analyze_session_id,
                'filter_data' => $request['filter_obj'],
                'session_name' => $request['session_name'],
                'created_by' => Auth::id()
            ])){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Session saved successfully.'
                ]);
            } else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something wrong. Please try again!'
                ]);
            }
        }
    }

    function save_user_session_update(Request $request) {
        // $user_id = Auth::id();
        $user_self_analyze_session_id = Session::get('user_self_analyze_session_id');
        $session_data = Selfanalyzeusersession::where('session_id', $user_self_analyze_session_id)->first();
        $session = Selfanalyzeusersession::findOrFail($session_data['id']);
        $session->session_id = $user_self_analyze_session_id;
        $session->filter_data = $request['filter_obj'];
        $session->session_name = $request['session_name'];
        $session->updated_by = Auth::id();;
        if($session->update()){
            return response()->json([
                'status' => 'success',
                'message' => 'Session updated successfully.'
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something wrong. Please try again!'
            ]);
        }
    }
}
