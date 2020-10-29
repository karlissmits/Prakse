<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Csvdata;
use App\User;
use App\Http\Requests;
use Excel;
use DB;


class DataController extends Controller
{
    public function index()
    {
      $users = DB::select('SELECT * FROM users');
      $id = \Auth::user();
      if ($id->role_id==1){
     return view('Data', ['finaldata' =>  Csvdata::all()]);
     }
    }


    public function store(Request $request)
    {
      $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();
      if (($file=fopen($filePath, 'r')) !== FALSE) {
        $first = true;

        $csvd = csvData::select('code', 'valid_from')->get()->pluck('valid_from', 'code')->toArray();

          while ( ($data = fgetcsv ( $file, 1000, ';' )) !== FALSE ) {
            if($first){
              $first = false;
              continue;
            }

          //$finaldata = Csvdata::all();
          //Table Update
          $code = $data[0];
          $country = $data[1];
          $valid_from = $data[2];
          $valid_until = $data[3];
          $stunden = $data[4];
          $one_day = $data[5];
          $lump_sum = $data[6];
          //$table->unique(['code', 'valid_from']);

          if(isset($csvd[$code])) {

              // update
              csvData::where(['code' => $code, 'valid_from'=> $valid_from])
                  ->update(['valid_until' => $valid_until]);
        }



          if(!isset($csvd[$code])) {
              // new csv upload
              $csv_data = new Csvdata ();
              $csv_data->code = $data [0];
              $csv_data->country = $data [1];
              $csv_data->valid_from = $data [2];
              $csv_data->valid_until = $data [3];
              $csv_data->stunden = $data [4];
              $csv_data->one_day = $data [5];
              $csv_data->lump_sum = $data [6];
              $csv_data->save ();
          }

            //$exists = DB::table('csvData')->where('code', 'AF')->first();

            //if(!$exists){

            // not there
            }


          fclose ( $file );

//$finaldata = Csvdata::all();
//return view('Data', compact('finalData'));
//$finalData = DB::select('SELECT * FROM csvData');
//return view ( 'Data' )->withData ( 'finalData',$finalData );
return $this->index();
// return redirect('data');
//return view ( 'Data', ['finaldata' => $finaldata] );
//$post = Post::find($id);
//return view('posts.show')->with('post' , $post);
    }
  }


    public function search(Request $request)
    {

    if($request->ajax())
    {

    $output="";

    $csv=DB::table('csvData')->where('code','LIKE','%'.$request->search."%")->get();

    if($csv)
    {
    foreach ($csv as $key => $csvv) {
    $output.='<tr>'.

    '<td>'.$csvv->code.'</td>'.
    '<td>'.$csvv->country.'</td>'.
    '<td>'.$csvv->valid_from.'</td>'.
    '<td>'.$csvv->valid_until.'</td>'.
    '<td>'.$csvv->stunden.'</td>'.
    '<td>'.$csvv->one_day.'</td>'.
    '<td>'.$csvv->lump_sum.'</td>'.
    '</tr>';
    }
    return Response($output);
       }

    }
}


      }
