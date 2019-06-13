<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_Add_product extends Migration
{
	public function up(){
		//
		$this->forge->addField([
			'product_id'  		=> [
								'type' 			=> 'INT',
								'constraint' 	=> 5,
								'unsigned'		=> TRUE,
								'auto_increment'=> TRUE
			],
			'name' 			=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100',
			],
			'price'			=> [
								'type' 			=> 'BIGINT',
			],
			'qty'			=> [
								'type'			=> 'INT',
							]	
		]);
		$this->forge->addKey('product_id', TRUE);
		$this->forge->createTable('product');
	}

	//--------------------------------------------------------------------

	public function down(){
		//
		$this->forge->dropTable('product');
	}
}

