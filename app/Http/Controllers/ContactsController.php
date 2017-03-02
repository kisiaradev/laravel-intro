<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactsController extends Controller
{
	public function index()
	{
		return view("registered_contacts", ['contacts' => Contacts::all()]);
	}

    public function postContacts(Request $request)
    {

    	$user = Contacts::create($request->except('_token'));

    	if($user){
    		return redirect()->back()->with('user_created', "Successfully registered contact");
    	}else{
    		return redirect()->back()->with('user_creation_failed', "User not created. Please try again");
    	}

    }

    public function editContact($id)
    {
    	try 
    	{
    		$contact = Contacts::findOrFail($id);
    	} 
    	catch (Exception $e) 
    	{
    		dd("The user you are trying to delete does not exist");
    	}

    	return view('edit_contact', ['contact' => $contact]);
    }

    public function saveContactEdits(Request $request, $id)
    {
    	$updates = array_filter($request->except('_token'));

    	if(count($updates) > 0)
    	{
    		try {

    			$contact = Contacts::findOrFail($id);
    			$contact->update($updates);
    			return redirect('/contacts')->with('user_updated', 'user updated successfully');
    			
    		} catch (Exception $e) {
    			
    		}
    	}
    	return redirect('/contacts');    
    }

    public function removeContact($id)
    {
    	try 
    	{
    		Contacts::findOrFail($id)->forceDelete();
    	} 
    	catch (Exception $e) 
    	{
    		dd("The user you are trying to delete does not exist");
    	}
    	
    	return redirect('/contacts')->with('user_deleted', "User has been deleted successfully");
    }
}
