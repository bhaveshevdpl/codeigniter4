<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleAccessRights extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_access_rights_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'access_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('role_access_rights_id');
        /*$this->forge->addForeignKey('role_id','role_access','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('role_id','role_access','id','CASCADE','CASCADE');*/
        $this->forge->createTable('role_access_rights');
    }

    public function down()
    {
        $this->forge->dropTable('role_access_rights', true, true);
    }
}
