<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;

class ContactUsController extends Controller
{
    /**
     * Store a contact created resource in storage.
     *
     * @param CreateContactRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        $contact = new ContactUs;
        $contact->email   = $request->email;
        $contact->name    = htmlentities($request->name);
        $contact->subject = htmlentities($request->subject);
        $contact->message = htmlentities($request->message);
        $contact->save();
        return redirect()->route('home.index');
    }
}
