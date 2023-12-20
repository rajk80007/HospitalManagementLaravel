<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function save_contact(Request $request)
    {
        $data = new contact;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;

        $data->save();

        return redirect()->back()->with('message', "Thanks for writing to us. We will revert as soon as possible");

    }
}
