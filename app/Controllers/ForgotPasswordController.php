<?php

namespace App\Controllers;

use App\Models\ForgotPasswordModel;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        echo view('forgot_password_view');
    }

    public function sendOtp()
    {
        helper(['form', 'url']);
        $model = new ForgotPasswordModel();
        $session = session();

        $email = $this->request->getVar('email');
        $name = $this->request->getVar('name');

        $user = $model->checkEmailName($email, $name);

        if ($user) {
            $otp = $this->generateOtp();
            $otp_expiry = date("Y-m-d H:i:s", strtotime('+5 minutes'));

            $data = [
                'otp' => $otp,
                'otp_expiry' => $otp_expiry
            ];

            $model->updateOTP($data, $email);

            // send email
            $emailService = \Config\Services::email();
            $emailService->setFrom('noreply.courseoutcome@gmail.com', 'course outcomes');
            $emailService->setTo($email);  // Pass the user's email address here
            $emailService->setSubject('OTP for Password Reset');
            $emailService->setMessage("Your OTP for password reset is: " . $otp . "\n\nIt will expire in 5 minutes.");

            if ($emailService->send()) {
                $session->set('reset_email', $email);
                $session->set('otp_expiry', $otp_expiry);
                return redirect()->to('verify_otp?from=forgot_password');
            } else {
                return redirect()->back()->with('error', 'Error sending email.');
            }
        } else {
            return redirect()->back()->with('error', 'Email and name combination not found in our records.');
        }
    }

    private function generateOtp($length = 6)
    {
        $digits = '0123456789';
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $digits[rand(0, strlen($digits) - 1)];
        }
        return $otp;
    }
}