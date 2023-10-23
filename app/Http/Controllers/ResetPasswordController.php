<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Assistant;
use App\Models\Patient;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;

// Setup PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class ResetPasswordController extends Controller
{
    public $token, $user;
    public function forgotPasswordView($userType)
    {
        return view('auth.reset-password.forgot_password', ['userType' => $userType]);
    }

    public function newPasswordDoctorView()
    {
        $userToken = request('token');
        return view('auth.reset-password.new_password', ['userType' => 'doctor', 'userToken' => $userToken]);
    }

    public function newPasswordPatientView()
    {
        $userToken = request('token');
        return view('auth.reset-password.new_password', ['userType' => 'patient', 'userToken' => $userToken]);
    }

    public function newPasswordAdminView()
    {
        $userToken = request('token');
        return view('auth.reset-password.new_password', ['userType' => 'admin', 'userToken' => $userToken]);
    }

    public function passwordChangedView()
    {
        return view('auth.reset-password.password_changed');
    }

    public function recoveryEmailSentView()
    {
        return view('auth.reset-password.recovery_email_sent');
    }

    // this function send an amail co,tain a recovert password link to the users
    public function sendRecoveryEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email'
        ]);

        global $token;
        global $user;

        $token = $user = "";

        // get User type and token
        switch ($request->userType) {
            case  'doctor':
                $user  = Doctor::where('dr_email', '=', $request->email)->first();
                if ($user) {
                    $token = $user->dr_token;
                } else {
                    return back()->with('info', "Email ne correspond à aucun compte!");
                }
                break;
            case  'patient':
                $user = Patient::where('pa_email', '=', $request->email)->first();
                if ($user) {
                    $token = $user->pa_token;
                } else {
                    return back()->with('info', "Email ne correspond à aucun compte!");
                }
                break;
            case  'admin':
                $user = Admin::where('ad_email', '=', $request->email)->first();
                if ($user) {
                    $token = $user->ad_token;
                } else {
                    return back()->with('info', "Email ne correspond à aucun compte!");
                }
                break;
        }


        if (self::sendEmail($request->email, $token, $request->userType)) {

            $save = DB::table('password_resets')
                ->insert([
                    'email' => $request->email,
                    'token' => $token
                ]);

            if ($save) {
                return redirect('recovery-email-sent');
            } else {
                return back()->with('fail', "Erruer");
            }
        }
    }

    public function sendEmail($email, $token, $userType)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        ini_set('max_execution_time', '600');

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
            $mail->Password = '85a4bc7e8e4889';                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('rdv.doctors@gmail.com', 'Mouaidy');
            $mail->addAddress($email);     //Add a recipient


            // Get full url of the website
            $website_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

            $message = '';
            // Email Body 
            switch ($userType) {
                case  'doctor':
                    $message = 'Réinitialisation du mot de passe';
                    $message .= '<p style="margin-bottom: 2rem">Nous avons reçu une demande de réinitialisation du mot de passe du compte associé :' . $email .
                    ' Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien ci-dessous :</p>';
                    $message .= '<p><a style="width: 100%; 
            padding: .7rem 3rem; 
            font-size: .9rem; 
            color: #FFF; 
            background-color: #47c079;
            text-decoration: none;
            border-radius: .2rem;
            cursor: pointer;
            margin: auto;" href="' . $website_url . '/new-password-doctor?token=' . $token . '" target="_blank">Réinitialiser</a></p>';
                    $message .= '<p style="margin-top: 2rem">Thnaks.</p>';
                    $message .= '<p>Mouaidy.</p>';
                    break;
                case  'patient':
                    $message = 'Réinitialisation du mot de passe';
                    $message .= '<p style="margin-bottom: 2rem">Nous avons reçu une demande de réinitialisation du mot de passe du compte associé :' . $email .
                    ' Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien ci-dessous :</p>';
                    $message .= '<p><a style="width: 100%; 
            padding: .7rem 3rem; 
            font-size: .9rem; 
            color: #FFF; 
            background-color: #47c079;
            text-decoration: none;
            border-radius: .2rem;
            cursor: pointer;
            margin: auto;" href="' . $website_url . '/new-password-patient?token=' . $token . '" target="_blank">Réinitialiser</a></p>';
                    $message .= '<p style="margin-top: 2rem">Thnaks.</p>';
                    $message .= '<p>Mouaidy.</p>';
                    break;
                case  'admin':
                    $message = 'Réinitialisation du mot de passe';
                    $message .= '<p style="margin-bottom: 2rem">Nous avons reçu une demande de réinitialisation du mot de passe du compte associé :' . $email .
                    ' Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien ci-dessous :</p>';
                    $message .= '<p><a style="width: 100%; 
            padding: .7rem 3rem; 
            font-size: .9rem; 
            color: #FFF; 
            background-color: #47c079;
            text-decoration: none;
            border-radius: .2rem;
            cursor: pointer;
            margin: auto;" href="' . $website_url . '/new-password-admin?token=' . $token . '" target="_blank">Réinitialiser</a></p>';
                    $message .= '<p style="margin-top: 2rem">Thnaks.</p>';
                    $message .= '<p>Mouaidy.</p>';
                    break;
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Récupération de mot de pass";
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

    public function resetPassword(Request $request)
    {

        $request->validate([
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|min:5',
        ]);

        switch ($request->userType) {
            case  'doctor':
                if ($request->new_password == $request->confirm_password) {
                    $doctor = Doctor::where('dr_token', '=', $request->userToken)->first();
                    $update = DB::table('doctors')
                        ->where('dr_email', $doctor->dr_email)
                        ->update([
                            'dr_password' => FacadesHash::make($request->new_password),
                        ]);

                    if ($update) {
                        // if update password the delete token and email from password reset table
                        $delete = DB::table('password_resets')
                            ->where('email', $doctor->dr_email)
                            ->delete();
                        return redirect('password-changed');
                    } else {
                        return back()->with('fail', 'Erreur de mise à jour, veuillez réessayer!');
                    }
                } else {
                    return back()->with('fail', 'Pas le même mot de passe!');
                }
                break;
            case  'patient':
                if ($request->new_password == $request->confirm_password) {
                    $patient = Patient::where('pa_token', '=', $request->userToken)->first();
                    $update = DB::table('patients')
                        ->where('pa_email', $patient->pa_email)
                        ->update([
                            'pa_password' => FacadesHash::make($request->new_password),
                        ]);

                    if ($update) {
                        // if update password the delete token and email from password reset table
                        $delete = DB::table('password_resets')
                            ->where('email', $patient->pa_email)
                            ->delete();
                        return redirect('password-changed');
                    } else {
                        return back()->with('fail', 'Erreur de mise à jour, veuillez réessayer!');
                    }
                } else {
                    return back()->with('info', 'Pas le même mot de passe!');
                }
                break;
            case  'admin':
                if ($request->new_password == $request->confirm_password) {
                    $admin = Patient::where('ad_token', '=', $request->userToken)->first();
                    $update = DB::table('admins')
                        ->where('ad_email', $admin->ad_email)
                        ->update([
                            'ad_password' => FacadesHash::make($request->new_password),
                        ]);

                    if ($update) {
                        // if update password the delete token and email from password reset table
                        $delete = DB::table('password_resets')
                            ->where('email', $admin->ad_email)
                            ->delete();
                        return redirect('password-changed');
                    } else {
                        return back()->with('fail', 'Erreur de mise à jour, veuillez réessayer!');
                    }
                } else {
                    return back()->with('info', 'Pas le même mot de passe!');
                }
                break;
        }
    }
}
