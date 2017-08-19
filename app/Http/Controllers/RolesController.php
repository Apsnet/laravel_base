<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RolesController extends Controller
{
    public function index()
    {
        return Role::where('id', '>', 1)->get();
    }
}
