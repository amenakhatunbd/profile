<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{
    public function store(){
       $contact_form_data = request()->all();
       Mail::to('amenakhatun1212@gamil.com')->send(new ContactFormMail($contact_form_data));
       return redirect()->route('home', '/#contact')->with('success', ' our message has been successfully submited');
    }
}
