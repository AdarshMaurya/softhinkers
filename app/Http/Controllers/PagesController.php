<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex()
    {
        $title = 'Welcome To Softhinkers';
        return view('pages.index')->with('title', $title);
    }

    public function getAbout()
    {
        $data = array(
           'title'=>'About Us',
            'details' =>['Adarsh Maurya', 'adarsh@softhinkers.com']
        );
        return view('pages.about')->with($data);
    }

    public function getServices()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Mobile App Development', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('contact@softhinkers.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect('/');
    }

}
