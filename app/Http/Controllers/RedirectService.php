<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectService extends Controller
{
    public function go(Request $request, string $reference)
    {
        dd($request);
    }
}
