<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Darbibasvardi;
use Illuminate\Support\Facades\Input;
use App\User;
use DB;

class DarbibasvController extends Controller
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
        $darbibasv = DB::select('SELECT * FROM darbibasvardi');
        return view('darbibas_vardi.darbibasv')->with('darbibasv',$darbibasv);
    }

    public function add(Request $request)
        {
          //$lietvards = new Lietvardi();
          //$lietvards->lietvards = Input::get('lietvards');
          //$lietvards->save();
          //$lietvards = new Lietvardi();
          //$this->validate($request, ['lietvards' => ['required','string', 'max:255']]);
          //  $lietvards->save();

          $darbibasv = new Darbibasvardi();
            $darbibasv->darbibasv = $request->input('darbibasv');
            $darbibasv->user = auth()->user()->name;
            $darbibasv->save();

            return redirect('darbibasvardi')->with('success', 'Lietvards pievienots');
        }

        public function show(Request $request){
          return view('darbibas_vardi.darbibasv_pievienot');
        }


          public function edit(Request $request,$id) {
            $this->validate($request, ['darbibasv' => ['required', 'string', 'max:255'], 'user' => ['required','string', 'max:255']]);

              $dv = $request->input('darbibasv');
              $user = $request->input('user');

          DB::update('update darbibasvardi set darbibasv=?,user=? where id = ?',[$dv,$user,$id]);
          $darbibasv = DB::select('SELECT * FROM darbibasvardi');
      return redirect('/darbibasvardi');
  }

    public function show2($id) {
        $dv = DB::select('select * from darbibasvardi where id = ?',[$id]);
        return view('darbibas_vardi.darbibasv_edit',['darbibasv'=>$dv]);
    }

    public function destroy($id)
    {
        $dv = Darbibasv::find($id);
        $dv->delete();
        return redirect('/darbibasvardi')->with('success', 'Lietvards izdzests');
    }
    public function show3()
    {
        //$posts = Post::orderBy('title','asc')-> get();
        $darbibasv = DB::select('SELECT * FROM darbibasvardi');
        return view('darbibas_vardi.jaunie_vardi_darbibasv')->with('darbibasv',$darbibasv);
    }

    public function apstiprinat($id)
    {
        $dv = Darbibasvardi::find($id);
        DB::update('update darbibasvardi set apstiprinats_id=1 where id = ?',[$id]);
        return redirect('/jauniedv')->with('success', 'Darbibas vards apstiprinats');
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
