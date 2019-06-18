<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }
    public function save($nameProduct, $plu, $barcode, $category, $supplier, $typesOfProducts, $stockable, $consumeable, $services, $rental, $none, $lotsm, $serialNumber, $weight, $volume, $canBeSold, $canBePurchase, $sellingPrice, $purchasePrice)
    {
        $date = array('nameProduct' => $nameProduct,
                      'plu'         => $plu,
                      'barcode'     => $barcode
        );
    }
}

;
