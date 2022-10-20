<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleMaster extends Migration
{
    public function up()
    {
    	$this->db->disableForeignKeyChecks();
    	$this->forge->addField([
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '4',
            ],
            'created_at datetime default current_timestamp',
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('role_id');
        $this->forge->createTable('role_master');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('role_master', true, true);
    }
}
