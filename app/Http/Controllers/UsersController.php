<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\User;
use Session;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::all();
        $username = $request->input('username');
        $password = $request->input('password');
        $db = User::where('username', $username)->where('password', $password)->get();
        //$arr = (array)$db;
    //    return $db->count();
        if (!$db->count()) {
            return 'nu merge';
        }else {
            //$string = Str::random(40);
            $request->session()->put('admin' ,$username);
            $get_sesstion = $request->session()->get('admin');
            return $get_sesstion;
        }

/*
        $data = $request->input();
        $request->session()->put('Data',$data);
        $output = $request->session()->get('Data');
        if ($output) {
            echo "session is here";
            return $output;
        }else {
            echo "session nu eaci";
        }
*/
    }

    public function logOut(){
        $session()->forget('admin');
        return redirect('admin');
    }



}
