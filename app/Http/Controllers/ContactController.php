<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//Setup PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class ContactController extends Controller
{

    public function contactAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        
        if(self::sendEmail($request->subject, $request->message)){
            $contact = new Contact();
            $contact->co_name = $request->name;
            $contact->co_subject = $request->subject;
            $contact->co_email = $request->email;
            $contact->co_message = $request->message;

            $save = $contact->save();

            if($save) {
                return redirect('message-sent');
            } else {
                return back()->with('fail', "Erruer  ");
            }
        }


        // $contact = new Contact();
        // $contact->co_name = $request->name;
        // $contact->co_subject = $request->subject;
        // $contact->co_email = $request->email;
        // $contact->co_message = $request->message;

        // $save = $contact->save();

        // if ($save) {
        //     return redirect('message-sent');
        // } else {
        //     return back()->with('fail', "Erruer  ");
        // }
    }

    public function sendEmail($subject, $message)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        ini_set('max_execution_time', '600');

        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
            $mail->Username = 'ba76bbc7e962a5';
            $mail->Password = '85a4bc7e8e4889';

            //Recipients
            $mail->setFrom('rdv.doctors@gmail.com', 'Mouaidy');
            $mail->addAddress('younesilyes2108@gmail.com');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return back()->with('fail', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
