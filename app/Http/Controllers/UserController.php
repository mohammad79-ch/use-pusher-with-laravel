<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\App\Models\User::paginate(10);
        return UserResource::collection($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new \App\Models\User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->file=$request->file;

        if ($user->save()){
            return new UserResource($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=\App\Models\User::findOrFail($id);

        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $user=\App\Models\User::findOrFail($id);
        $user->name=$request->name;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->file=$request->file;

        if ($user->update()){
            return new UserResource($user);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=\App\Models\User::findOrFail($id);
        if ($user->delete()){
            return new UserResource($user);
        }
    }
}
