<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index(){
        $users = User::paginate(15);
        return UserResource::collection($users);
    }

    public function show($id){
        $user = User::findOrFail( $id );
        return new UserResource( $user );
    }

    public function store(Request $request){
        $user = new User;
        $user->Name = $request->input('Name');
        $user->Email = $request->input('Email');
        $user->Password = bcrypt($request->input('Password'));
        $user->PhoneNumber = $request->input('PhoneNumber');
        $user->Address = $request->input('Address');
        $user->Role = $request->input('Role');

        if( $user->save() ){
            return new UserResource( $user );
        }
    }

    public function update(Request $request)
    {
        $user = User::findOrFail( $request->id );
        $user->Name = $request->input('Name');
        $user->Email = $request->input('Email');
        $user->Password = bcrypt($request->input('Password'));
        $user->PhoneNumber = $request->input('PhoneNumber');
        $user->Address = $request->input('Address');
        $user->Role = $request->input('Role');

        if( $user->save() )
        {
            return new UserResource($user);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail( $id );
        if( $user->delete() )
        {
            return new UserResource( $user );
        }
    }
}