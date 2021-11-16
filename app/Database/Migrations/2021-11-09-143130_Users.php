<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id'          => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'user_id'          => [
        'type'           => 'INT',
        'constraint'     => 255,
        'unsigned'       => true,
      ],
      'name'       => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'email'       => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'password'       => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'img'       => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'status'       => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('users');
  }

  public function down()
  {
    $this->forge->dropTable('users');
  }
}
