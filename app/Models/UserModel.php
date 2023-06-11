<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model

{
    public function verifyOTP($email, $otp)
    {
        return $this->db->table('main_table')
            ->where('email', $email)
            ->where('otp', $otp)
            ->get()
            ->getRowArray();
    }
    public function getWaitingUsers()
    {
        return $this->db->table('temp_table')->where('email_status', 1)->where('user_type', 'hod')->get()->getResultArray();
    }

    public function getApprovedUsers()
    {
        return $this->db->table('main_table')->where('is_approve', 1)->where('user_type', 'hod')->get()->getResultArray();
    }

    public function approveUser($id)
    {
        $tempUserData = $this->db->table('temp_table')->where('id', $id)->get()->getRowArray();
        if ($tempUserData) {
            $existsInMain = $this->db->table('main_table')->where('email', $tempUserData['email'])->countAllResults();
            if ($existsInMain > 0) {
                return "Email already exists in the main table.";
            } else {
                $tempUserData['is_approve'] = 1;
                $this->db->table('main_table')->insert($tempUserData);
                $this->db->table('temp_table')->delete(['id' => $id]);
                return "User approved successfully.";
            }
        }
        return "User not found.";
    }

    public function rejectUser($id)
    {
        $deleted = $this->db->table('temp_table')->delete(['id' => $id]);
        if ($deleted) {
            return "User rejected successfully.";
        }
        return "Error rejecting user.";
    }

    public function deleteUser($id)
    {
        $deleted = $this->db->table('main_table')->delete(['id' => $id]);
        if ($deleted) {
            return "User deleted successfully.";
        }
        return "Error deleting user.";
    }

    public function attemptLogin($email, $password)
    {
        $user = $this->db->table('main_table')
            ->where(['email' => $email])
            ->get()
            ->getRowArray();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        // Check temp_table
        $tempUser = $this->db->table('temp_table')
            ->where(['email' => $email])
            ->get()
            ->getRowArray();

        if ($tempUser) {
            if (password_verify($password, $tempUser['password'])) {
                return $tempUser;
            }
        }

        return false;
    }
    public function checkUserExists($email)
    {
        return $this->db->table('temp_table')->where('email', $email)->countAllResults() > 0;
    }

    public function insertUser($data)
    {
        return $this->db->table('temp_table')->insert($data);
    }
}