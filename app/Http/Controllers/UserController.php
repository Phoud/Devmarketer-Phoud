<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use Hash;
use Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(6);
        return view('manage.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users'
        ]);
        if($request->has('password') && !empty($request->password)){
            $password=trim($request->password);
        }else{
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit')-1;
            for($i=0; $i<$length; ++$i){
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;

        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);

        if($user->save()){
            return redirect()->route('users.show', $user->id);   
        }else{
            Session::flash('danger', 'Sorry something went wrong');
            return redirect()->route('users.create');
        }

    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id

        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password_options == 'auto') {
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit')-1;
            for($i=0; $i<$length; ++$i){
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
        }elseif($request->password_options == 'manual'){
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            return redirect()->route('users.show', $id);
        }else{
            Session::flash('error', 'Sorry! Cannot edit the user. Please try again later');
            return redirect()->route('users.edit', $id);
        }
    }

    public function destroy($id)
    {
        //
    }
}
