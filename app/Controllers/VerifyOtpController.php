<?php

namespace App\Controllers;

use App\Models\VerifyOtpModel;

class VerifyOtpController extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('reset_email')) {
            return redirect()->to('/forgot_password');
        }

        $current_time = date("Y-m-d H:i:s");
        $otp_expiry = $session->get('otp_expiry');

        if ($current_time > $otp_expiry) {
            $session->remove(['otp_expiry', 'reset_email']);
            return redirect()->to('/forgot_password')->with('error', 'OTP has expired! please generate new one.');
        }

        return view('verify_otp_view', ['otp_expiry' => $otp_expiry]);
    }

    public function verify()
    {
        $session = session();
        $email = $session->get('reset_email');
        $entered_otp = $this->request->getPost('otp');

        $model = new VerifyOtpModel();
        $user = $model->getUserByEmailAndOtp($email, $entered_otp);

        if ($user) {
            return redirect()->to('/new_password')->with('email', $email)->with('message', 'User verification successful, set a new password.');
        } else {
            return redirect()->back()->with('error', 'Invalid or expired OTP. Please try again.');
        }
    }
}