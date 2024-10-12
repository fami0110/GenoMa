<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function change($lang) {
        session()->put('locale', $lang);
        return back();
    }
}
