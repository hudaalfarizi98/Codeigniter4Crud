<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_Add_customer extends Migration
{
	public function up(){
		//
		$this->forge->addField([
			'customer_id'  		=> [
								'type' 			=> 'INT',
								'constraint' 	=> 5,
								'unsigned'		=> TRUE,
								'auto_increment'=> TRUE
			],
			'name' 			=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100',
			],
			'dateofbirth'	=> [
								'type' 			=> 'DATE',
			],
			'address'		=> [
								'type'			=> 'TEXT',
							]	
		]);
		$this->forge->addKey('customer_id', TRUE);
		$this->forge->createTable('customer');
	}

	//--------------------------------------------------------------------

	public function down(){
		//
		$this->forge->dropTable('customer');
	}
}
