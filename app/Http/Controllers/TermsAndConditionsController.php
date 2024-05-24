<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    

    public function show()
    {
        return view('crudbooster.terms_and_conditions');
    }
}
