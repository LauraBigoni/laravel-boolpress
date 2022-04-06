<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Send an email from the website form.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $data = $request->all();
        return response()->json($data);
    }
}
