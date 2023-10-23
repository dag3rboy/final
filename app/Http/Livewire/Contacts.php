<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

//Setup PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


class Contacts extends Component
{

    public $co_id, $name, $subject, $email, $message;
    public $res_subject, $res_email, $res_message;

    public function render()
    {
        return view('livewire.contacts', ['contacts' => Contact::orderBy('co_id', 'asc')->paginate(7)]);
    }

    // function to open view Contact modal 
    public function openViewContactModal($co_id)
    {
        $contact_infos = Contact::where('co_id', '=', $co_id)->first();
        $this->co_id = $contact_infos->co_id;
        $this->name = $contact_infos->co_name;
        $this->subject = $contact_infos->co_subject;
        $this->email = $contact_infos->co_email;
        $this->message = $contact_infos->co_message;
        $this->dispatchBrowserEvent('openViewContactModal');
    }

    // function to open response Contact modal 
    public function openContactResponseModal($email)
    {
        $this->res_email = $email;
        $this->dispatchBrowserEvent('openContactResponseModal',  ['res_email' => $email]);
    }

    //function to send email to users 
    public function send()
    {
        $this->validate([
            'res_email' => 'required|email',
            'res_subject' => 'required',
            'res_message' => 'required'
        ], [
            'res_email.required' => 'Insérez l\'email s\'il vous plaît',
            'res_subject.required' => 'Insérez l\'objet  s\'il vous plaît',
            'res_message.required' => 'Insérez le message s\'il vous plaît'
        ]);

        // Send email to the user
        if (self::sendEmail($this->res_email, $this->res_subject, $this->res_message)) {
            $this->dispatchBrowserEvent('closeContactResponseModal');
        } else {
            $this->dispatchBrowserEvent('closeContactResponseModalFail');
        }
    }

    // function to show confirmation deleting dialog
    public function deleteConfirm($co_id)
    {
        // $Contact_infos = Contact::where('co_id', '=', $co_id)->first();
        $this->dispatchBrowserEvent('SwalConfirm', ['id' => $co_id]);
    }

    // function to delete message
    public function delete($co_id)
    {
        dd($co_id);
        $delete = Contact::where('co_id', '=', $co_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('deleted');
        }
    }


    public function sendEmail($email, $subject, $message)
    {
        
        $mail = new PHPMailer(true);
        ini_set('max_execution_time', '600');

        try {
        
            //$mail->SMTPDebug = 1;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
            $mail->Username = 'ba76bbc7e962a5';
            $mail->Password = '85a4bc7e8e4889';                                    

            $mail->setFrom('rdv.doctors@gmail.com', 'Mouaidy');
            $mail->addAddress($email);    
            
            $mail->isHTML(true);                                 
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
