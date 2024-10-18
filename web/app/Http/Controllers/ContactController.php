<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class ContactController extends Controller
{
    public function index() {
        return view('contact', [
            'current_page' => 'contact',
        ]);
    }

    public function process(Request $req) {
        $data = $req->validate([
            'email' => 'required|email:dns',
            'message' => 'required|string',
        ]);

        Mail::to('masandofami@gmail.com')->send(new SendEmail($data));

        return redirect('/contact')->with('success', "Email sent successfully!");
    }
}
