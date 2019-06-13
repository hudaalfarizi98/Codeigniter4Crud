<?php namespace  App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_Add_user extends \CodeIgniter\Database\Migration {

	public function up(){
		$this->forge->addField([
			'user_id'  		=> [
								'type' 			=> 'INT',
								'constraint' 	=> 5,
								'unsigned'		=> TRUE,
								'auto_increment'=> TRUE
			],
			'name' 			=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100',
			],
			'email' 		=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100',
			],
			'password' 		=> [
								'type'			=> 'TEXT',
								'constraint'	=> '500',
			],
			'dateofbirth'	=> [
								'type' 			=> 'DATE',
			],
			'address'		=> [
								'type'			=> 'TEXT',
			],
			'level'			=> [
								'type'			=> 'INT',
								'constraint'	=> 5,
			],	
			'status'		=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '20',
			]
		]);
		$this->forge->addKey('user_id', TRUE);
		$this->forge->createTable('user');
	}

	public function down(){
		$this->forge->dropTable('user');
	}
}

;?>