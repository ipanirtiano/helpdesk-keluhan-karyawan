<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keluhan extends Migration
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
			'kode_keluhan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
			],
			'tanggal_create' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'tanggal_update' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'subject' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'detail_keluhan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255
			],
			'created' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
			],
			'progres' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
			],
			'status' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'foto' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     => true
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     => true
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('keluhan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('keluhan');
	}
}
