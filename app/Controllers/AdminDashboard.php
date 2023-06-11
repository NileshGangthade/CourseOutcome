<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AdminDashboard extends Controller
{
    public function index()
    {
        $model = new UserModel();

        $data['waitingUsers'] = $model->getWaitingUsers();
        $data['approvedUsers'] = $model->getApprovedUsers();

        return view('admin_dashboard', $data);
    }
    public function handle_approval()
    {
        if (!is_ajax_request() || !isset($_POST['action']) || !isset($_POST['id'])) {
            return;
        }

        $action = $_POST['action'];
        $id = $_POST['id'];
        $model = new \App\Models\UserModel();

        switch ($action) {
            case 'approve':
                echo $model->approveUser($id);
                break;
            case 'reject':
                echo $model->rejectUser($id);
                break;
            case 'delete':
                echo $model->deleteUser($id);
                break;
            default:
                echo "Invalid action";
                break;
        }
    }
}
