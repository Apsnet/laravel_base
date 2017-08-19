<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sappi;

class SappiController extends Controller
{
    public function users(Request $request)
    {
        return response()->json(Sappi::users($request->user()), 200);
    }
}
