<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_Add_product extends Migration
{
	public function up(){
		//
		$this->forge->addField([
			'barcode' 			=> [
								'type'			=> 'INT',
								'constraint'	=> '11',
								'unsigned'		=> true,
			],
			'name' 				=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100',
			],
			'plu' 				=> [
								'type'			=> 'INT',
								'constraint'
			],
			'category' 			=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100'
			],
			'supplier' 			=> [
								'type'			=> 'INT',
			],
			'typesOfProducts' 	=> [
								'type'			=> 'VARCHAR',
								'constraint'	=> '100'
			],
			'stockable' 		=> [
								'type'		=> 'BOOLEAN',
								'default'	=> FALSE,
			],
			'consumeable' 		=> [
								'type'		=> 'BOOLEAN',
								'default'	=> FALSE,
			],
			'services' 			=> [
								'type'		=> 'BOOLEAN',
								'default'	=> FALSE,

			],
			'rental' 			=> [
								'type'		=> 'BOOLEAN',
								'default'	=> FALSE,
			],
			'none' 				=> [
								'type'		=> 'BOOLEAN',
								'default'	=> FALSE,
			],
			'lots' 				=> [
								'type'		=> 'INT',
			],
			'serialNumber' 		=> [
								'type'		=> 'INT',
			],
			'weight' 			=> [
								'type'		=> 'INT',
			],
			'volume' 			=> [
								'type'		=> 'INT',
			],
			'canBeSold' 		=> [
								'type'		=> 'BOOLEAN',
								'default'	=> FALSE,
			],
			'canBePurchase' 	=> [
								'type'		=> 'BOOLEAN',
								'default'	=> FALSE,
			],
			'sellingPrice' 		=> [
								'type'		=> 'INT',
			],
			'purchasePrice' 	=> [
								'type'		=> 'INT',
			],	
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

