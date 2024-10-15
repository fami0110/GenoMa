<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contact', [
            'current_page' => 'contact',
        ]);
    }

    public function process(Request $req) {
        return redirect('/contact')->with('success', "Email sent successfully!");
    }
}
