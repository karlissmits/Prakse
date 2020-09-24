<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
   public function index()
{
  $users = DB::select('SELECT * FROM users');
return view('admin')->with ('users', $users);
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
'</tr>';
}
return Response($output);
   }
   }
}
}
