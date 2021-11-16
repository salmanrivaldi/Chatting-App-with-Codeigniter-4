<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Messages extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'message_id'          => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'receiver_id'          => [
        'type'           => 'INT',
        'constraint'     => 255,
        'unsigned'       => true,
      ],
      'sender_id'       => [
        'type'           => 'INT',
        'constraint'     => 255,
        'unsigned'       => true,
      ],
      'message'       => [
        'type'       => 'VARCHAR',
        'constraint' => '1000',
      ],
    ]);
    $this->forge->addKey('message_id', true);
    $this->forge->createTable('messages');
  }

  public function down()
  {
    $this->forge->dropTable('messages');
  }
}
