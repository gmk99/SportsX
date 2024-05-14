<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\Users as UserResource;
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
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if( $user->save() ){
            return new UserResource( $user );
        }
    }

    public function update(Request $request)
    {
        $user = User::findOrFail( $request->id );
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

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
