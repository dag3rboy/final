<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravelCrud;
use App\Http\Controllers\PaypalController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Main Routes
Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/doctors', 'App\Http\Controllers\MainController@doctors');
Route::get('/doctor-details/{id}', 'App\Http\Controllers\MainController@doctorDetails');
Route::get('/specialites', 'App\Http\Controllers\MainController@specialites');
Route::get('/search-by-speciality', 'App\Http\Controllers\MainController@searchBySpeciality');
Route::post('/index-search-doctor', 'App\Http\Controllers\MainController@indexSearchDoctor')->name('index-search-doctor');;
Route::get('/make-appointment/{id}', 'App\Http\Controllers\MainController@makeAppointment');
Route::post('/save-appointment', 'App\Http\Controllers\AppointmentController@saveAppointment')->name('makeAppointment');
Route::get('/contact-us', 'App\Http\Controllers\MainController@contact');
Route::post('/contact-admin', 'App\Http\Controllers\ContactController@contactAdmin')->name('contactAdmin');
Route::post('/contact-email-template', 'App\Http\Controllers\ContactController@contactAdmin');

// Custom Routes 
Route::get('/404', 'App\Http\Controllers\CustomPagesController@pageNotFound');
Route::get('/message-sent', 'App\Http\Controllers\CustomPagesController@messageSent');
Route::get('/appointment-sent', 'App\Http\Controllers\CustomPagesController@appointmentSent');

// Login Routes 
Route::get('/admin-login', 'App\Http\Controllers\AdminAuthController@adminLoginView');
Route::post('/check-admin', 'App\Http\Controllers\AdminsController@checkAdmin')->name('auth.login.check-admin');

Route::get('/patient-login', 'App\Http\Controllers\PatientsController@patientLoginIndex');
Route::post('/check-patient', 'App\Http\Controllers\PatientsController@checkPatientLogin')->name('auth.login.check-patient');

Route::get('/doctor-login', 'App\Http\Controllers\DoctorsController@doctorLoginView');
Route::post('/check-doctor', 'App\Http\Controllers\DoctorsController@checkDoctor')->name('auth.login.check-doctor');

Route::get('/assistant-login', 'App\Http\Controllers\AssistantAuthController@assistantLoginView');
Route::post('/check-assistant', 'App\Http\Controllers\AssistantsController@checkAssistant')->name('auth.login.check-assistant');

// Register Routes 
Route::get('/patient-register', 'App\Http\Controllers\PatientsController@patientRegisterIndex');
Route::post('/create-patient', 'App\Http\Controllers\PatientsController@registerPatient')->name('auth.register.create-patient');
Route::get('/registration-done', 'App\Http\Controllers\PatientsController@patientRegistrationDone');
Route::get('crud', [laravelCrud::class, 'indexix']);
Route::post('add', [laravelCrud::class, 'add']);

//paypal Routes
Route::controller(PaypalController::class)->group(function(){
    Route::get('/checkout', 'index')->name('paymentindex');
    Route::post('/request-payment', 'RequestPayment')->name('requestpayment');
    Route::get('/payment-success', 'PaymentSuccess')->name('paymentsuccess');
    Route::get('/payment-cancel', 'PaymentCancel')->name('paymentCancel'); 
});





Route::get('/doctor-register', 'App\Http\Controllers\DoctorsController@doctorRegisterView');
Route::post('/create-doctor', 'App\Http\Controllers\DoctorsController@registerDoctor')->name('auth.register.create-doctor');
Route::get('/registration-done', 'App\Http\Controllers\DoctorsController@doctorRegistrationDone');
Route::get('/registration-failed', 'App\Http\Controllers\DoctorsController@doctorRegistrationFailed');
Route::get('/request-sent', 'App\Http\Controllers\DoctorsController@registrationRequestSent');
Route::get('/confime-account', 'App\Http\Controllers\DoctorsController@activateAcoount');
Route::post('api/fetch-cities', 'App\Http\Controllers\DoctorsController@fetchCity');

// Reset Password Routes
Route::get('/forgot-password/{userType}', 'App\Http\Controllers\ResetPasswordController@forgotPasswordView');
Route::post('/send-reset-link', 'App\Http\Controllers\ResetPasswordController@sendRecoveryEmail')->name('forgotPassord');
Route::get('/new-password-doctor', 'App\Http\Controllers\ResetPasswordController@newPasswordDoctorView');
Route::get('/new-password-patient', 'App\Http\Controllers\ResetPasswordController@newPasswordPatientView');
Route::get('/new-password-admin', 'App\Http\Controllers\ResetPasswordController@newPasswordAdminView');
Route::post('/reset-password', 'App\Http\Controllers\ResetPasswordController@resetPassword')->name('resetPassword');
Route::get('/password-changed', 'App\Http\Controllers\ResetPasswordController@passwordChangedView');
Route::get('/recovery-email-sent', 'App\Http\Controllers\ResetPasswordController@recoveryEmailSentView');

// Admin Dashboard Pages
Route::group(['middleware' => ['adminsAuthCheck']], function() {

    Route::get('/admin/dashboard', 'App\Http\Controllers\AdminsController@index');
    Route::get('/admin/doctors', 'App\Http\Controllers\AdminsController@doctors');
    Route::get('/admin/doctors-request', 'App\Http\Controllers\AdminsController@doctorsRequests');
    Route::get('/admin/assistants', 'App\Http\Controllers\AdminsController@assistants');
    Route::get('/admin/patients', 'App\Http\Controllers\AdminsController@patients');
    Route::get('/admin/specialite', 'App\Http\Controllers\AdminsController@specialites');
    Route::get('/admin/contacts', 'App\Http\Controllers\AdminsController@contacts');

    // Route::get('/admin/email-sender', 'App\Http\Controllers\AdminsController@emailSender');
    // Route::get('/admin/sms-sender', 'App\Http\Controllers\AdminsController@smsSender');
    Route::get('/admin/contact-patients', 'App\Http\Controllers\AdminsController@contactPatients');
    Route::get('/admin/contact-doctors', 'App\Http\Controllers\AdminsController@contactDoctors');

    Route::get('/admin/password', 'App\Http\Controllers\AdminsController@password');
    Route::get('/admin/profile', 'App\Http\Controllers\AdminsController@profile');
    Route::post('/update-admin_infos', 'App\Http\Controllers\AdminsController@updateAdmin')->name('update-admin');
    Route::post('/update-admin_password', 'App\Http\Controllers\AdminsController@updatePassword')->name('update-admin-password');
    Route::post('/change-admin-profile-picture', 'App\Http\Controllers\AdminsController@updatePicture')->name('adminPictureUpdate');


    // Route::post('/update-patient_infos', 'App\Http\Controllers\AdminsController@updatePatient')->name('update-patient');
    // Route::post('/update-patient_password', 'App\Http\Controllers\AdminsController@updatePassword')->name('update-patient-password');
    // Route::post('/desactivate-account-patient', 'App\Http\Controllers\AdminsController@desactivatePatientAccount')->name('desactivate-patient-account');
    // Route::post('/change-profile-picture-patient', 'App\Http\Controllers\AdminsController@updatePicture')->name('patientPictureUpdate');

    Route::get('/admin-logout', 'App\Http\Controllers\AdminsController@adminLogout');
});

// Patient Dashboard Pages
Route::group(['middleware' => ['patientsAuthCheck']], function() {
    Route::get('/patient/dashboard', 'App\Http\Controllers\PatientsController@index');
    Route::get('/patient/appointments', 'App\Http\Controllers\PatientsController@appointments');
    Route::get('/patient/profile', 'App\Http\Controllers\PatientsController@profile');
    Route::get('/patient/password', 'App\Http\Controllers\PatientsController@password');
    Route::get('/patient/account', 'App\Http\Controllers\PatientsController@account');

    Route::post('/update-patient_infos', 'App\Http\Controllers\PatientsController@updatePatient')->name('update-patient');
    Route::post('/update-patient_password', 'App\Http\Controllers\PatientsController@updatePassword')->name('update-patient-password');
    Route::post('/desactivate-account-patient', 'App\Http\Controllers\PatientsController@desactivatePatientAccount')->name('desactivate-patient-account');
    Route::post('/change-patient-profile-picture', 'App\Http\Controllers\PatientsController@updatePicture')->name('patientPictureUpdate');

    Route::get('/patient-logout', 'App\Http\Controllers\PatientsController@patientLogout');
});

// Doctor Dashboard Pages
Route::group(['middleware' => ['doctorsAuthCheck']], function () {
    Route::get('/doctor/dashboard', 'App\Http\Controllers\DoctorsController@index');
    Route::get('/doctor/assistants', 'App\Http\Controllers\DoctorsController@assistants');
    Route::get('/doctor/consultation', 'App\Http\Controllers\AssistantsController@appointments');
    Route::get('/doctor/calender', 'App\Http\Controllers\DoctorsController@calender');
    Route::get('/doctor/cv', 'App\Http\Controllers\DoctorsController@cv');
    Route::get('/doctor/profile', 'App\Http\Controllers\DoctorsController@profile');
    Route::get('/doctor/settings', 'App\Http\Controllers\DoctorsController@settings');
    Route::post('/update-doctor_infos', 'App\Http\Controllers\DoctorsController@updateDoctor')->name('update-doctor');
    Route::post('/update-doctor_password', 'App\Http\Controllers\DoctorsController@updatePassword')->name('update-password');
    Route::post('/active-appointment', 'App\Http\Controllers\DoctorsController@updateOnlineAppointment')->name('active-online-appointment');
    Route::post('/delete-account', 'App\Http\Controllers\DoctorsController@deleteDoctorAccount')->name('delete-doctor-account');

    Route::post('/change-doctor-profile-picture', 'App\Http\Controllers\DoctorsController@updatePicture')->name('doctorPictureUpdate');
    
    Route::post('/update-cv-infos', 'App\Http\Controllers\DoctorsController@updateCVInfos')->name('update-cv-infos');
    Route::post('/update-cv-map', 'App\Http\Controllers\DoctorsController@updateCVMap')->name('update-cv-map');
    Route::post('/add-diplome', 'App\Http\Controllers\DoctorsController@addDiplome')->name('add-diplome');
    Route::get('/delete-diplome/{id}', 'App\Http\Controllers\DoctorsController@deleteDiplome')->name('delete-diplome');
    Route::post('/add-experience', 'App\Http\Controllers\DoctorsController@addExperience')->name('add-experience');
    Route::get('/delete-experience/{id}', 'App\Http\Controllers\DoctorsController@deleteExperience')->name('delete-experience');
    Route::post('/add-equipement', 'App\Http\Controllers\DoctorsController@addEquipment')->name('add-equipement');
    Route::get('/delete-equipement/{id}', 'App\Http\Controllers\DoctorsController@deleteEquipment')->name('delete-equipement');
    Route::post('/add-working-day', 'App\Http\Controllers\DoctorsController@addEWorkingDay')->name('add-working-day');
    Route::get('/delete-working-day/{id}', 'App\Http\Controllers\DoctorsController@deleteWorkingDay')->name('delete-working-day');
    Route::post('/add-tarif', 'App\Http\Controllers\DoctorsController@addTarif')->name('add-tarif');
    Route::get('/delete-tarif/{id}', 'App\Http\Controllers\DoctorsController@deleteTarif')->name('delete-tarif');
    Route::get('/doctor-logout', 'App\Http\Controllers\DoctorsController@doctorLogout');
});

// Assistant Dashboard Pages
Route::group(['middleware' => ['assistantsAuthCheck']], function () {
    Route::get('/assistant/dashboard', 'App\Http\Controllers\AssistantsController@index');
    Route::get('/assistant/appointments', 'App\Http\Controllers\AssistantsController@appointments');
    Route::get('/assistant/consultation', 'App\Http\Controllers\AssistantsController@appointments');
    Route::get('/assistant/calender', 'App\Http\Controllers\AssistantsController@calender');
    Route::get('/assistant/settings', 'App\Http\Controllers\AssistantsController@settings');

    // Route::post('/update-doctor_infos', 'App\Http\Controllers\AssistantsController@updateDoctor')->name('update-doctor');
    // Route::post('/update-doctor_password', 'App\Http\Controllers\AssistantsController@updatePassword')->name('update-password');
    // Route::post('/change-profile-picture', 'App\Http\Controllers\AssistantsController@updatePicture')->name('adminPictureUpdate');

    Route::get('/assistant-logout', 'App\Http\Controllers\AssistantsController@assistantLogout');
});

