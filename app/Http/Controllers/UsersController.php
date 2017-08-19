<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\UserRegistred;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::where('role_id', '>', 1)->with('role')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'role_id' => $request->input('role'),
            'password' => $request->input('password') !== null ? Hash::make($request->input('password')) : Hash::make(str_random(8))
        ];

        $user = User::create($data);
        event(new UserRegistred($user));
        return response(['data' => $user], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $service = $request->user()->services()->find($request->header('Source'));
        if (!$service->pivot->active) {
            $service->pivot->active = 1;
            $service->pivot->save();
        }
        $id = Input::get('id');
        if ($id) {
            return User::where('id', $id)->with('role')->with('services')->first();
        } else {
            return $request->user();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
