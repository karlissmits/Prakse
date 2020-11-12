<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lietvardi;
use Illuminate\Support\Facades\Input;
use App\User;
use DB;

class LietvardiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('title','asc')-> get();
        $lietvardi = DB::select('SELECT * FROM lietvardi');
        return view('lietvardi.lietvardi')->with('lietvardi',$lietvardi);
    }

    public function add(Request $request)
        {
          //$lietvards = new Lietvardi();
          //$lietvards->lietvards = Input::get('lietvards');
          //$lietvards->save();
          //$lietvards = new Lietvardi();
          //$this->validate($request, ['lietvards' => ['required','string', 'max:255']]);
          //  $lietvards->save();

            $lietvards = new Lietvardi();
            $lietvards->lietvards = $request->input('lietvards');
            $lietvards->user = auth()->user()->name;
            $lietvards->save();

            return redirect('lietvardi')->with('success', 'Lietvards pievienots');
        }

      public function show(Request $request){
        return view('lietvardi.lietvardi_pievienot');
        }


      public function edit(Request $request,$id) {
           $this->validate($request, ['lietvards' => ['required', 'string', 'max:255'], 'user' => ['required','string', 'max:255']]);

           $lietvards = $request->input('lietvards');
           $user = $request->input('user');

          DB::update('update lietvardi set lietvards=?,user=? where id = ?',[$lietvards,$user,$id]);
          $lietvardi = DB::select('SELECT * FROM lietvardi');
      return redirect('/lietvardi');
    }

    public function show2($id) {
        $lietvards = DB::select('select * from lietvardi where id = ?',[$id]);
        return view('lietvardi.lietvards_edit',['lietvards'=>$lietvards]);
    }

    public function destroy2($id)
    {
        $lietvards = Lietvardi::find($id);
        $lietvards->delete();
        return redirect('/lietvardi')->with('success', 'Lietvards izdzests');
    }

    public function destroy($id)
    {
      $vardi = DB::select('SELECT * FROM lietvardi WHERE id=? UNION
      SELECT * FROM darbibasvardi
      WHERE id=?', [$id]);
        $vardi->delete();
        return redirect('/lietvardi')->with('success', 'Lietvards izdzests');
    }

    public function show3()
    {
        //$lietvardi = Lietvardi::all();
        $vardi = DB::select('SELECT * FROM lietvardi WHERE apstiprinats_id=0 UNION
        SELECT * FROM darbibasvardi
        WHERE apstiprinats_id=0');
        return view('lietvardi.jaunie_vardi')->with('vardi',$vardi);
    }

    public function apstiprinat($id)
    {
        $lietvards = Lietvardi::find($id);
        DB::update('update lietvardi set apstiprinats_id=1 where id = ?',[$id]);
        return redirect('/jaunie')->with('success', 'Lietvards apstiprinats');
    }

    public function search(Request $request)
    {

    if($request->ajax())
    {

    $output="";
    $lietvardi=DB::table('lietvardi')->where('lietvards','LIKE','%'.$request->search."%")->get();

    if($lietvardi)
    {
    foreach ($lietvardi as $key => $lietvards) {
    $output.='<tr>'.

    '<td>'.$lietvards->id.'</td>'.
    '<td>'.$lietvards->lietvards.'</td>'.
    '<td>'.$lietvards->created_at.'</td>'.
    '<td>'.$lietvards->user.'</td>'.

    '</tr>';
    }
    return Response($output);
       }
    }
  }

  public function status()
{
  $dosen = DB::table('lietvardi')->get();

  $dosenSortedDesc = $dosen->sortBy('lietvardi')->chunk(7);
   return view('lietvardi', compact('dosen'));
  }
}
