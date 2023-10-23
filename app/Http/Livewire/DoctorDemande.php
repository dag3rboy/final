<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Doctor;
use App\Models\DoctorCV;
use Livewire\WithPagination;

// Setup PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



class DoctorDemande extends Component
{

    use WithPagination;

    public
        $dr_id,
        $dr_firstname,
        $dr_lastname,
        $dr_username,
        $dr_password,
        $dr_gender,
        $dr_email,
        $dr_telephone,
        $dr_wilaya,
        $dr_city,
        $dr_adress,
        $dr_service,
        $dr_stat,
        $dr_department,
        $dr_speciality,
        $dr_birthday;

    protected $listeners = ['deleteDM'];



    public function render()
    {
        return view('livewire.doctor-demande', ['doctors' => Doctor::where('dr_confirmed', 0)->orderBy('dr_id', 'asc')->paginate(7)]);
    }

    // function to open view doctor demande modal 
    public function openViewDoctorModal($dr_id)
    {
        $doctor_infos = Doctor::where('dr_id', '=', $dr_id)->first();

        $this->dr_id = $doctor_infos->dr_id;
        $this->dr_firstname = $doctor_infos->dr_firstname;
        $this->dr_lastname = $doctor_infos->dr_lastname;
        $this->dr_username = $doctor_infos->dr_username;
        $this->dr_password = $doctor_infos->dr_password;
        $this->dr_gender = $doctor_infos->dr_gender;
        $this->dr_email = $doctor_infos->dr_email;
        $this->dr_telephone = $doctor_infos->dr_telephone;
        $this->dr_wilaya = $doctor_infos->dr_wilaya;
        $this->dr_city = $doctor_infos->dr_city;
        $this->dr_adress = $doctor_infos->dr_adress;
        $this->dr_department = $doctor_infos->dr_department;
        $this->dr_service = $doctor_infos->dr_service;
        $this->dr_stat = $doctor_infos->dr_active;
        $this->dr_speciality = $doctor_infos->dr_speciality;
        $this->dr_birthday = $doctor_infos->dr_birthday;

        $this->dispatchBrowserEvent('openViewDoctorModal');
    }

    // function to send confirmation email to the doctor
    public function validateDemande($dr_id)
    {
        // dd("Demande Validé");
        // $update = Doctor::where('dr_id', '=', $dr_id)->update([
        //     'dr_confirmed' => 1
        // ]);
        $doctor = Doctor::where('dr_id', '=', $dr_id)->first();
        $dr_token = $doctor->dr_token;
        // dd("Email : " . $doctor->dr_email  ." " . "Token : " . $dr_token);
        // if ($update) {
        //     if ($this->sendConfimationEmail($doctor->dr_email, $dr_token)) {
        //         $this->dispatchBrowserEvent('DemandeAccepted');
        //     }
        // }

        if (self::sendConfimationEmail($doctor->dr_email, $dr_token)) {
            $update = Doctor::where('dr_id', '=', $dr_id)->update([
                'dr_confirmed' => 1
            ]);
            $doctor = Doctor::where('dr_id', '=', $dr_id)->first();
            $dr_token = $doctor->dr_token;
            if ($update) {
                // if ($this->sendConfimationEmail($doctor->dr_email, $dr_token)) {

                // }
                DoctorCV::insert([
                    'dr_id' =>  $dr_id,
                    'cv_about' => "",
                    'cv_phone' => "",
                    'cv_email' => "",
                    'cv_website' => "",
                    'cv_map' => ""
                ]);
                $this->dispatchBrowserEvent('DemandeAccepted');
            }
        } else {
            $this->dispatchBrowserEvent('EmailError');
        }
    }

    // function to informe the doctor that his demande is refused
    public function refuseDemande($dr_id)
    {


        $update = Doctor::where('dr_id', '=', $dr_id)->update([
            'dr_confirmed' => 2
        ]);

        $doctor = Doctor::where('dr_id', '=', $dr_id)->first();
        // dd("Demande Refussed!! " . $doctor->dr_email);
        if ($update) {
            $this->dispatchBrowserEvent('DemandeRefused');
            // if ($this->sendInformationnEmail($doctor->dr_email)) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                //$mail->SMTPDebug = 1;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();

                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 2525;
                $mail->Username = 'ba76bbc7e962a5';
                $mail->Password = '85a4bc7e8e4889';

                // $mail->Host = 'smtp.mailgun.org';
                // $mail->SMTPAuth = true;
                // $mail->SMTPSecure = 'tls';
                // $mail->Port = 587;
                // $mail->Username = 'postmaster@sandbox2d6ff290b931412bb69f6ba36740f24b.mailgun.org';
                // $mail->Password = 'cdc99045253dc345288699f76c666c62-4f207195-e383e0cd';

                //Recipients
                // $mail->setFrom('rdv.doctors@gmail.com', 'Mouaidy');
                $mail->setFrom('info@mailtrap.io', 'Mouaidy');
                // $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
                $mail->addAddress($doctor->dr_email);     //Add a recipient

                $message = '<p style="margin-bottom: 2rem">Bonjour. </p>';
                $message .= '<p style="margin-bottom: 2rem">Nous voulons vous informer que votre demande d\'inscription est refusée par notre administration système</p>';
                $message .= '<p style="margin-top: 2rem">Merci.</p>';
                $message .= '<p>Mouaidy.</p>';

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Demande d'inscription refusé";
                $mail->Body    = $message;

                $mail->send();
                //$this->dispatchBrowserEvent('DemandeRefused');

                // if ($mail->send()) {
                //    
                // } else {
                //     echo "Message could not be sent. Mailer Error";
                // }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return back()->with('fail', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
            // }
        }
    }


    // function to show confirmation deleting dialog
    public function deleteConfirm($dr_id)
    {
        $this->dispatchBrowserEvent('SwalConfirmDM', [
            'id' => $dr_id
        ]);
    }

    // function to delete doctor demande
    public function deleteDM($dr_id)
    {
        $delete = Doctor::where('dr_id', '=', $dr_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('deletedDM');
        }
    }


    public function sendConfimationEmail($email, $token)
    {
        //Create an instance; passing `true` enables exceptions
        ini_set('max_execution_time', '600');
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = 1;
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
            $mail->addAddress($email);     //Add a recipient


            // Get full url of the website
            $website_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

            $message = '<p style="margin-bottom: 10px">Bonjour. </p>';
            $message .= '<p style="margin-bottom: 10px">pour terminer votre processus d\'inscription dans notre système, veuillez cliquer sur le lien de confirmation ci-dessous pour activer votre compte</p>';
            $message .= '<p><a style="width: 100%; 
            padding: 10px 35px; 
            font-size: 15px; 
            color: #FFF; 
            background-color: #47c079;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            margin: auto;" href="' . $website_url . '/confime-account?token=' . $token . '">Confirmer</a></p>';
            $message .= '<p style="margin-top: 2rem">Merci.</p>';
            $message .= '<p>Mouaidy.</p>';

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Confirmation du compte";
            $mail->Body = $message;

            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return back()->with('fail', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    public function sendInformationnEmail($email)
    {
        //Create an instance; passing `true` enables exceptions
        ini_set('max_execution_time', '600');
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = 1;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
            $mail->Username = 'ba76bbc7e962a5';
            $mail->Password = '85a4bc7e8e4889';

            //Recipients
            // $mail->setFrom('rdv.doctors@gmail.com', 'Mouaidy');
            $mail->setFrom('info@mailtrap.io', 'Mailtrap');
            // $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
            $mail->addAddress($email);     //Add a recipient

            $message = '<p style="margin-bottom: 2rem">Bonjour. </p>';
            $message .= '<p style="margin-bottom: 2rem">Nous voulons vous informer que votre demande d\'inscription est refusée par notre administration système</p>';
            $message .= '<p style="margin-top: 2rem">Merci.</p>';
            $message .= '<p>Mouaidy.</p>';

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Demande d'inscription refusé";
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
