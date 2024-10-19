<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
       if (session("magicLogin")) {

            return redirect()->to("set-password")
                             ->with("message", "Please update your password");
                             
       }
        
        return view('Home/index');
    }

    private function sendTestEmail()
    {
        $email = \Config\Services::email();

        $email->setTo('bryangutie32@gmail.com');

        $email->setSubject("Test Email");

        $email->setMessage("Hello from <i>CodeIngiter</i>");

        if ($email->send()) {

            echo "Email sent";

            } else {

                echo "Email not sent";
        }
    }
}
