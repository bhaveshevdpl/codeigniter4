<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleAccess extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'access_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'access_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'controller_slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'parent_access_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('access_id');
        $this->forge->createTable('role_access');
    }

    public function down()
    {
        $this->forge->dropTable('role_access', true, true);
    }
}
