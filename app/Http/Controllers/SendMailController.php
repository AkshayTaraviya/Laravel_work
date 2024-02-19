<?php

namespace App\Http\Controllers;




use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Webklex\IMAP\Facades\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function index()
    {
        $users = User::all();
        $url = "https://google.com";
        $mail = Mail::to('')->send(new SendMail($users,$url));

        $client = Client::account('default');
        $client->connect();
        $folder = $client->getFolder('Sent Mail');
        $result = $folder->appendMessage($mail->getSymfonySentMessage()->toString(), ['\Seen'], now()->format("d-M-Y h:i:s O"));
        
    }
}

