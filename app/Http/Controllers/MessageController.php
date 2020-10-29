<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DB;

class MessageController extends Controller
{
  public function index()
  {
      //$posts = Post::orderBy('title','asc')-> get();
      $contact = DB::select('SELECT * FROM contacts');
     //$contact = Contact::orderBy('created_at','desc')-> paginate(6);
      return view('messages')->with('contacts',$contact);
  }

  public function delete()
  {
      //$posts = Post::orderBy('title','asc')-> get();
      $contact = DB::select('SELECT * FROM contacts');
     //$contact = Contact::orderBy('created_at','desc')-> paginate(6);
      return view('messages')->with('contacts',$contact);
  }


  public function destroy($id)
  {
      $contact = Contact::find($id);
      $contact->delete();
      return redirect('/messages')->with('success', 'Message Deleted');
  }
}
