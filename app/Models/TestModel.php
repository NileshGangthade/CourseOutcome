<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'dummy'; // Set the appropriate default table name

    public function createTable($tableName, $department)
    {
        // Select the appropriate database
        $db = db_connect($department);

        // Check if the table exists
        if (!$db->tableExists($tableName)) {
            // Create the table
            $forge = \Config\Database::forge($db);
            $fields = [
                'main_question' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => false,
                ],
                'sub_question_number' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => false,
                ],
                'sub_question' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => false,
                ],
                'marks' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ],
                'co' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ],
                'bl' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ],
            ];

            $forge->addField($fields);
            $forge->createTable($tableName, true);
        }
    }

    public function insertData($tableName, $mainQuestion, $subQuestionNumber, $subQuestion, $marks, $co, $bl)
    {
        $data = [
            'main_question' => $mainQuestion,
            'sub_question_number' => $subQuestionNumber,
            'sub_question' => $subQuestion,
            'marks' => $marks,
            'co' => $co,
            'bl' => $bl,
        ];

        $this->db->table($tableName)->insert($data);
    }
}
