<?php namespace App\Controllers;

use App\Models\ProductsModel;
use Config\Database;

class Product extends \CodeIgniter\Controller
{
    public function index()
    {
        return view('product');
    }

    public function add()
    {
        $db = \Config\Database::connect();
        $model = new ProductsModel($db);
        $nameProduct = htmlspecialchars($this->request->getPost('name'));
        $plu = htmlspecialchars($this->request->getPost('plu'));
        $barcode = htmlspecialchars($this->request->getPost('barcode'));
        $category = htmlspecialchars($this->request->getPost('category'));
        $supplier = htmlspecialchars($this->request->getPost('supplier'));
        $typesOfProducts = htmlspecialchars($this->request->getPost('typesOfProducts'));
        $stockable = htmlspecialchars($this->request->getPost('stockable'));
        $consumeable = htmlspecialchars($this->request->getPost('consumeable'));
        $services = htmlspecialchars($this->request->getPost('services'));
        $rental = htmlspecialchars($this->request->getPost('rental'));
        $none = htmlspecialchars($this->request->getPost('none'));
        $lots = htmlspecialchars($this->request->getPost('lots'));
        $serialNumber = htmlspecialchars($this->request->getPost('serialNumber'));
        $weight = htmlspecialchars($this->request->getPost('weight'));
        $volume = htmlspecialchars($this->request->getPost('volume'));
        $canBeSold = htmlspecialchars($this->request->getPost('canBeSold'));
        $canBePurchase = htmlspecialchars($this->request->getPost('canBePurchase'));
        $sellingPrice = htmlspecialchars($this->request->getPost('sellingPrice'));
        $purchasePrice = htmlspecialchars($this->request->getPost('purchasePrice'));
        //save data to database4
        $save = $model->save($nameProduct, $plu, $barcode, $category, $supplier, $typesOfProducts, $stockable, $consumeable, $services, $rental, $none, $lotsm, $serialNumber, $weight, $volume, $canBeSold, $canBePurchase, $sellingPrice, $purchasePrice);
        if ($save) {
            $output = array("status" => "Data Saved successfully");
            echo json_encode($output);
        } else {
            $output = array('status' => 'Failed');
            echo json_decode($output);
        }
    }
}
