<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_Add_salt extends Migration
{
	public function up(){
		//
		$this->forge->addField([
			'salt_id'  		=> [
								'type' 			=> 'INT',
								'constraint' 	=> 5,
								'unsigned'		=> TRUE,
								'auto_increment'=> TRUE
			],
			'email' 			=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100',
			],
			'salt'				=> [
								'type' 			=> 'TEXT',
			],
		]);
		$this->forge->addKey('salt_id', TRUE);
		$this->forge->createTable('salt');
	}

	//--------------------------------------------------------------------

	public function down(){
		//
		$this->forge->dropTable('salt');
	}
}