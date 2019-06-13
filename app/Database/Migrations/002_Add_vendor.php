<?php namespace  App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_Add_vendor extends \CodeIgniter\Database\Migration {

	public function up(){
		$this->forge->addField([
			'vendor_id'  		=> [
								'type' 			=> 'INT',
								'constraint' 	=> 5,
								'unsigned'		=> TRUE,
								'auto_increment'=> TRUE
			],
			'vendor_name' 			=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100',
			],
			'address'		=> [
								'type'			=> 'TEXT',
							]	
		]);
		$this->forge->addKey('vendor_id', TRUE);
		$this->forge->createTable('vendor');
	}

	public function down(){
		$this->forge->dropTable('vendor');
	}
}

;?>