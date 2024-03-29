<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CiSessions extends Migration
{
    protected $DBGroup = 'default';

    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => false],
            'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => false],
            'user_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false, 'default' => 0],
            'timestamp' => ['type' => 'INT', 'unsigned' => true, 'null' => false, 'default' => 0],
            'data' => ['type' => 'TEXT', 'null' => false, 'default' => ''],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('timestamp');
        $this->forge->createTable('ci_sessions', true);
    }

    public function down()
    {
        $this->forge->dropTable('ci_sessions', true);
    }

}
