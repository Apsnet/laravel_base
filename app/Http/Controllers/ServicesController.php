<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        // foreach ($services as $service) {
        //     $service['actives'] = count($service->users->where('active', 1));
        // }
        return $services;
    }
}
