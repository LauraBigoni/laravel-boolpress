<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Send an email from the website form.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // # Validazione
        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email',
                'message' => 'required'
            ],
            [
                'email.required' => 'La mail è obbligatoria.',
                'email.email' => 'L\'indirizzo email non è valido.',
                'message.required' => 'Il testo del messaggio è obbligatorio.'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        };

        $message = new Message();
        $message->fill($data);
        $message->save();

        $mail = new ContactMessageMail($data);
        Mail::to(env('MAIL_ADMIN_ADDRESS'))->send($mail);

        return response('Mail sent successfully', 204);
    }
}
