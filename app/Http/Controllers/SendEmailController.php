<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{

    /**
     * Send email.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        $validaSendingEmailData = $request->validate([
            'name' => 'required|max:100|string',
            'email' => 'required|max:255|string',
            'message' => 'required|string',
        ]);
        $name = $validaSendingEmailData['name'];
        $email = $validaSendingEmailData['email'];

        $contactUsEmail = new ContactUs($name, $email);

        Mail::to('nsdnever@gmail.com')->send($contactUsEmail);

        return redirect()
            ->route('posts.index', \App::getLocale())
            ->with('newEmailSendStatus', 'Email send Successfully');
    }
}
