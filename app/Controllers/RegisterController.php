<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        return view('register');
    }

    private function generateOTP($length = 6)
    {
        $digits = '0123456789';
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $digits[rand(0, strlen($digits) - 1)];
        }
        return $otp;
    }

    public function register_process()
    {
        $user_type = $_POST['user-type'];
        $department = $_POST['department'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $userExists = $this->userModel->checkUserExists($email);

        if ($userExists) {
            return redirect()->to('/register')->with('error', 'Email ID already exists');
        }

        $data = [
            'user_type' => $user_type,
            'department' => $department,
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
        ];

        $inserted = $this->userModel->insertUser($data);

        if ($inserted) {
            $otp = $this->generateOTP();
            $otp_expiry = date("Y-m-d H:i:s", strtotime('+5 minutes')); // OTP valid for 10 minutes

            $this->userModel->storeOtp($email, $otp, $otp_expiry);

            $subject = "OTP for Account verification";
            $message = "Your OTP for account verification is: " . $otp . "\n\nIt will expire in 5 minutes.";

            $emailService = \Config\Services::email();

            $emailService->setFrom('sknscoe.noreply.courseoutcome@gmail.com', 'course outcomes');
            $emailService->setTo($email);

            $emailService->setSubject($subject);
            $emailService->setMessage($message);

            if ($emailService->send()) {
                return redirect()->to("/verify_email?email={$email}")->with('message', 'OTP sent to your email');
            } else {
                $log = \Config\Services::log();
                $log->error('Error in sending email: ' . $emailService->printDebugger(['headers']));

                return redirect()->to('/register')->with('error', 'Error in sending email');
            }
        } else {
            return redirect()->to('/register')->with('error', 'Something went wrong');
        }
    }
}