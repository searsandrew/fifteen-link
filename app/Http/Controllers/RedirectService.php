<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class RedirectService extends Controller
{
    public function go(Request $request, string $reference)
    {

        $link = Link::where('ref_id', $reference)->firstOrFail();
        visitor()->visit($link);

        return redirect($link->destination);
    }
}
