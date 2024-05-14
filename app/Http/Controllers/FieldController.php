<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Http\Resources\Field as FieldResource;
use Illuminate\Http\Request;

class FieldController extends Controller {

    public function index(){
        $fields = Field::paginate(15);
        return FieldResource::collection($fields);
    }

    public function show($id){
        $field = Field::findOrFail( $id );
        return new FieldResource( $field );
    }

    public function store(Request $request){
        $field = new Field;
        $field->FieldType = $request->input('FieldType');
        $field->Denomination = $request->input('Denomination');

        if( $field->save() ){
            return new FieldResource( $field );
        }
    }

    public function update(Request $request)
    {
        $field = Field::findOrFail( $request->id );
        $field->FieldType = $request->input('FieldType');
        $field->Denomination = $request->input('Denomination');

        if( $field->save() )
        {
            return new FieldResource($field);
        }
    }

    public function destroy($id)
    {
        $field = Field::findOrFail( $id );
        if( $field->delete() )
        {
            return new FieldResource( $field );
        }
    }
}
