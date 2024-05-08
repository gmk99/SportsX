<?php namespace App\Http\Controllers;

use App\Models\Contact as Contact;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index(){
        $contacts = Contact::paginate(15);
        return ContactResource::collection($contacts);
    }

    public function show($id){
        $contact = Contact::findOrFail( $id );
        return new ContactResource( $contact );
    }

    public function store(Request $request){
        $contact = new Contact;
        $contact->ContactID = $request->input('ContactID');
        $contact->FirstName = $request->input('FirstName');
        $contact->LastName = $request->input('LastName');
        $contact->PhoneNumber = $request->input('PhoneNumber');
        $contact->Email = $request->input('Email');
        if( $contact->save() ){
            return new ContactResource( $contact );
        }
    }

    public function update(Request $request) {
        $contact = Contact::findOrFail( $request->ContactID );
        $contact->FirstName = $request->input('FirstName');
        $contact->LastName = $request->input('LastName');
        $contact->PhoneNumber = $request->input('PhoneNumber');
        $contact->Email = $request->input('Email');
        if( $contact->save() ) {
            return new ContactResource($contact);
        }
    }

    public function destroy($id) {
        $contact = Contact::findOrFail( $id );
        if( $contact->delete() ) {
            return new ContactResource( $contact );
        }
    }
}