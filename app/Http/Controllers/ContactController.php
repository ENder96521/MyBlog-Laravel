<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() 
    {
        $data = Contact::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.contact', ['data' => $data]);
    }

    public function detail($id) 
    {
        $data = Contact::find($id);
        return view('backend.contactDetail', ['data' => $data]);
    }

    public function store(Request $request) 
    {
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
        ]);

        return redirect('/contact');
    }
}
