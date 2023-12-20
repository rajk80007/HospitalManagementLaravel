<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Contact;

class HomeController extends Controller
{
    public function redirect ()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = doctor::all();
                return View('user.home', compact('doctor'));
            }
            else
            {
                return View('admin.home');
            }
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else 
        {

            
            $doctor = doctor::all();
            return View('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {

        $data = new appointment;
        
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In progress';
        if(Auth::id())
        {

            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment Request Successfull. We will contact with you soon');

    }
    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;

            $appoint = appointment::where('user_id', $userid)->get();

            return view('user.my_appointment', compact('appoint'));
        }
        else 
        {
            return redirect()->back();
        }
    }
    public function cancel_appoint($id)
    {
        $data = appointment::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function about()
    {
        $doctor = doctor::all();
        return view('user.about', compact('doctor'));
    }
    public function doctor()
    {
        $doctor = doctor::all();
        return view('user.doctors', compact('doctor'));
    }

    public function news()
    {
        return view('user.news');
    }
    public function contact()
    {
        return view('user.contact');
    }

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
