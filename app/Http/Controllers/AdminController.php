<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use resources\view\inc;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::select('SELECT * FROM users');
        $id = \Auth::user();
         if ($id->role_id==1){
        return view('admin')->with ('users', $users);
        }



    }


    public function show($id) {
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('users_update',['users'=>$users]);
    }
    public function edit(Request $request,$id) {

      $this->validate($request, ['email' => ['required', 'string', 'email', 'max:255'], 'name' => ['required','string', 'max:255'], 'password' => ['required', 'string', 'min:8','confirmed']]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordh = Hash::make($password);
        $role_id = $request->input('role_id');



    DB::update('update users set name=?,email=?,password=?,role_id=? where id = ?',[$name,$email,$passwordh,$role_id,$id]);
    $users = DB::select('SELECT * FROM users');
return redirect('/admin');

}

public function destroy($id)
{
    DB::delete('delete from users where id = ?',[$id]);
    return redirect('/admin')->with('success', 'User Deleted');
}


public function show2() {

    return view('users_add');
}

public function add(Request $request)
    {
        $this->validate($request, ['email' => ['required', 'string', 'email', 'max:255', 'unique:users'], 'name' => ['required','string', 'max:255'], 'password' => ['required', 'string', 'min:8', 'confirmed']]);


        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('admin')->with('success', 'User Added');
    }



    public function search(Request $request)
    {

    if($request->ajax())
    {

    $output="";

    $users=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();



    if($users)
    {
    foreach ($users as $key => $user) {
    $output.='<tr>'.


    '<td>'.$user->id.'</td>'.
    '<td>'.$user->name.'</td>'.
    '<td>'.$user->email.'</td>'.
    '<td>'.$user->password.'</td>'.
    '<td>'.$user->role_id.'</td>'.
    '<td><a href="edit/'.$user->id.'" class="btn btn-secondary">Edit</a></td>'.
    '<td><a  onclick="return myFunction()"  href="delete/'.$user->id.'"  class="btn btn-danger">Delete</a></td>'.

    '</tr>';
    }
    return Response($output);
       }

    }
}

       }
