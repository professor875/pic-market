<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->get('query');

        return view('welcome', compact('search'));
    }
}
