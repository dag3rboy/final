<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithPagination;
use Twilio\Rest\Client;

// Setup PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// $client = new Twilio\Rest\Client($sid, $token);

class ContactDoctor extends Component
{

    use WithPagination;

    public $search;
    public $email, $subject, $message, $telephone;

    public function render()
    {

        return view('livewire.contact-doctor', [
            'doctors' => Doctor::when($this->search, function ($query, $search) {
                return $query->where('dr_firstname', 'LIKE', "%$search%")
                    ->orWhere('dr_lastname', 'LIKE', "%$search%");
            })->paginate(6)
        ]);
    }

    // function to open send email  modal 
    public function openSendEmailModal($dr_email)
    {
        $this->email = $dr_email;
        $this->dispatchBrowserEvent('openSendEmailModal');
    }

    // function to open send sms  modal 
    public function openSendSMSModal($dr_telephone)
    {
        $this->telephone = $dr_telephone;
        $this->dispatchBrowserEvent('openSendSMSModal');
    }

    // function to send emails to  doctors
    public function sendEmail()
    {
        $this->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'email.required' => 'Email requis',
            'email.email' => 'Email non valid',
            'subject.required' => 'Objet requis ',
            'message.required' => 'Message requis',
        ]);

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
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
            $mail->setFrom('info@mailtrap.io', 'Mouaidy');
            $mail->addAddress($this->email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->Body    = $this->message;

            if ($mail->send()) {
                $this->dispatchBrowserEvent('closeSendEamileModal');
            } else {
                $this->dispatchBrowserEvent('EmailError');
            }
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('EmailError');
            return back()->with('fail', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    // function to send sms to doctors
    public function sendSMS()
    {
        $this->validate([
            'telephone' => 'required|min:10',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'telephone.required' => 'Email requis',
            'subject.required' => 'Objet requis ',
            'message.required' => 'Message requis',
        ]);

        try {
            $client = new Client('ACe70bb72f74ee5471619133ebcad94e23', '5f712b36515d9c171ab86ae7229ed88e');
            $client->messages->create("+213" . $this->telephone, [
                'from' => '+12058465226',
                'body' => $this->message
            ]);

            $this->dispatchBrowserEvent('closeSendSMSModal');
        } catch (Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }
}
