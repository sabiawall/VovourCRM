<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendEmail() {
        try {
            $toEmailAddress = "";
            $welcomeMessage = "Hey! Welcome to Programming Fiels. This is mailtrap email configuration";
        }
        catch(exception $e) {
            \Log::error("Unable to send email" . $e->getMessage());
        }
    }
}
