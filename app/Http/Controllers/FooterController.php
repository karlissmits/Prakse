<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DB;

class FooterController extends Controller
{

public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->content = $request->get('content');
        $contact->ip = $request->ip();

        $contact->save();
        return redirect('/')->with('success', 'Message sent');
    }

}
