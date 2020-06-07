<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageFormRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Mail\MailTrap;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {

        return view('contact.form');
    }

    /**
     * Display a listing of the resource.
     *
     * @param MessageFormRequest $request
     * @return Factory|View
     */
    public function send(MessageFormRequest $request)
    {
        $mail = $request->post('mail');
        $firstname = $request->post('firstname');
        $lastname = $request->post('lastname');
        $subject = $request->post('subject');
        $message = $request->post('message');


        Mail::to($mail)->send(new MailTrap($mail, $firstname, $lastname, $subject, $message));
        return view('contact.form');
    }
}
