<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Load the form view
        helper('department');
        // Load the session helper
        helper('session');

        // Retrieve the department value from session data
        $department = session('department');

        // Pass data to view
        $data = [
            'department' => $department
        ];

        return view('dashboard_view', $data);
    }



    public function processForm()
    {
        // Here you handle the form submission
        $model = new DashboardModel();
        $department = service('request')->getPost('department');
        $subject = service('request')->getPost('subject');
        $testType = service('request')->getPost('test-type');
        $year = service('request')->getPost('year');
        $sem = service('request')->getPost('sem');
        $academic_year = service('request')->getPost('academic-year');
        $division = service('request')->getPost('division');

        // Check and Create Database
        $model->checkAndCreateDatabase($department);

        // Set Table Name
        $table_name = $year . '_' . $department . '_' . $division . '_' . $sem . '_' . $subject . '_' . $testType . '_' . $academic_year;

        // Check if table exists
        if ($model->checkTable($table_name)) {
            // Load a view with existing paper options
            $data['table_data'] = $model->getTableData($table_name);
            echo view('existing_paper_view', $data);
        } else {
            // Create table if it doesn't exist
            $model->createTable($table_name);
            // Set session variables
            session()->set([
                'table_name' => $table_name,
                'department' => $department,
                'sem' => $sem
            ]);
            // Redirect to the next page
            return redirect()->to('/test_input');
        }
    }

    public function deleteTable()
    {
        $model = new DashboardModel();
        $table_name = service('request')->getPost('table_name');
        $model->deleteTable($table_name);
        // Redirect or load a view here after deleting the table
    }
}
