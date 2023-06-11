<?php

namespace App\Controllers;

use App\Models\TestModel;
use CodeIgniter\Controller;

class TestInputController extends Controller
{
    public function index()
    {
        return view('test_input');
    }

    public function handleFormSubmission()
    {
        if ($this->request->getMethod() === 'post') {
            // Get the number of main questions and subquestions
            $numMainQuestions = intval(service('request')->getPost('num_main_questions'));

            // Retrieve table name and department from session
            $session = session();
            $tableName = $session->get('table_name');
            $department = $session->get('department');

            // Create a new instance of TestModel
            $model = new TestModel();

            // Create the table if it doesn't exist
            $model->createTable($tableName, $department);

            // Insert data into the table
            for ($i = 1; $i <= $numMainQuestions; $i++) {
                $numSubQuestions = intval(service('request')->getPost("num_sub_questions_$i"));

                for ($j = 1; $j <= $numSubQuestions; $j++) {
                    $subQuestion = service('request')->getPost("sub_question_{$i}_{$j}");
                    $marks = intval(service('request')->getPost("marks_{$i}_{$j}"));
                    $co = intval(service('request')->getPost("co_{$i}_{$j}"));
                    $bl = intval(service('request')->getPost("bl_{$i}_{$j}"));

                    $model->insertData($tableName, $i, $j, $subQuestion, $marks, $co, $bl);
                }
            }

            // Redirect to the table display page
            return redirect()->to(site_url('excel_interface'));
        }
    }
}
