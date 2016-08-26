<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class HomeController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = Post::where('status', 1)->get();
    }

    public function index()
    {
        return view('welcome', ['data' => $this->data]);
    }

    public function show(Request $request, $id)
    {
        $data = Post::find($id);
        return view('post', ['data' => $data]);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = array(
                'email' => 'required|email', // make sure the email is an actual email
                'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
            );

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('login')
                                ->withErrors($validator) // send back all errors to the login form
                                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {

                // create our user data for the authentication
                $userdata = array(
                    'email' => $request->get('email'),
                    'password' => $request->get('password')
                );

                // attempt to do the login
                if (Auth::attempt($userdata)) {
                    return Redirect::to('admin');
                    
                } else {

                    // validation not successful, send back to form 
                    return Redirect::to('login');
                }
            }
        } else {
            return view('login');
        }
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('login');
    }

    public function search(Request $request)
    {
        $post = Post::search($request->get('q'))
                    ->where('status',1)
                    ->get();

        return response()->json($post, 200);
    }

}
