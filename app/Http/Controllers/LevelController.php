<?php namespace App\Http\Controllers;

use App\Models\Level as Level;
use App\Http\Resources\Level as LevelResource;
use Illuminate\Http\Request;

class LevelController extends Controller {
    public function index(){
        $levels = Level::paginate(15);
        return LevelResource::collection($levels);
    }

    public function show($id){
        $level = Level::findOrFail( $id );
        return new LevelResource( $level );
    }

    public function store(Request $request){
        $level = new Level;
        $level->LevelID = $request->input('LevelID');
        $level->LevelName = $request->input('LevelName');
        if( $level->save() ){
            return new LevelResource( $level );
        }
    }

    public function update(Request $request) {
        $level = Level::findOrFail( $request->LevelID );
        $level->LevelName = $request->input('LevelName');
        if( $level->save() ) {
            return new LevelResource($level);
        }
    }

    public function destroy($id) {
        $level = Level::findOrFail( $id );
        if( $level->delete() ) {
            return new LevelResource( $level );
        }
    }
}