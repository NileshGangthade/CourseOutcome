<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Migration;
use CodeIgniter\Database\Forge;
use InvalidArgumentException;

class DashboardModel extends Model
{
    protected $DBGroup = 'default';

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function checkAndCreateDatabase($department)
    {
        // Check if the database already exists
        $this->db->simpleQuery("CREATE DATABASE IF NOT EXISTS $department");
        $this->db->simpleQuery("USE $department");
    }

    public function checkTable($table_name)
    {
        // Check if the table exists
        return $this->db->tableExists($table_name);
    }

    public function createTable($table_name)
    {
        // Create table if it doesn't exist
        $forge = \Config\Database::forge();

        $fields = [
            'main_question' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'sub_question_number' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'sub_question' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'marks' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'co' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'bl' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ];

        // Define the primary key
        $forge->addField($fields);
        $forge->addKey('main_question', true);

        $forge->createTable($table_name, true);
    }

    public function getTableData($table_name)
    {
        return $this->db->table($table_name)->get()->getResultArray();
    }

    public function deleteTable($table_name)
    {
        $forge = \Config\Database::forge();

        if ($forge->dropTable($table_name, true)) {
            echo "Table deleted successfully";
        } else {
            echo "Error deleting table";
        }
    }
}