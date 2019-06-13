<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use App\Models\UserModel;
use Config\Database;

class User extends \CodeIgniter\Controller {

    public function index(){
        return view('regis');
    }

    public function save(){
            $db             = \Config\Database::connect();
            $model          = new UserModel($db);
            $char           = "AKSJDIHLKALSDKFHIJLAKSHDFILKDFILKADHFID";
            $salt           = $model->getrand(20, $char);
            $salt1          = sha1($salt);
            $pswd           = sha1($this->request->getPost('password'));
            $id             = htmlspecialchars($this->request->getPost('id'));
            $name           = htmlspecialchars($this->request->getPost('name'));
            $email          = $this->request->getPost('email');
            $password       = sha1($salt1 . $pswd);
            $dateofbirth    = htmlspecialchars($this->request->getPost('dateofbirth'));
            $address        = htmlspecialchars($this->request->getPost('address'));
            $status         = "N";
            //CHECK Data before save , denied if email has register
            $cek            = $model->cekEmail($email);
            $data           = array();
            foreach($cek->getResult() as $row) {
               $data['email'] = $row->total;
            }
            if ($data['email'] > 0 ) {
                $output = array("status" => "Email has been registered");
                echo json_encode($output);
            } else {
                // save user
                $saveUser = $model->regis($id,$name,$email,$password,$dateofbirth,$address,$level,$status);

                if ($saveUser) {
                    //save salt
                    $save = $model->saveSalt($email,$salt1);
                        if ($save) {
                        $output = array("status" => "Account successfully registered");
                        echo json_encode($output);
                        }
                }
            }

    }
    public function login(){
        $db             = \Config\Database::connect();
        $model          = new UserModel($db);
        //session
        $session = \Config\Services::session();
        $session->start();
        //get data form user
        $email          = $this->request->getPost('email');
        $password       = sha1($this->request->getPost('password'));
        //check data email
        $mail           = array();
        $check          =  $model->cekEmail($email);
        foreach($check->getResult() as $row) {
            $mail['email'] = $row->total;
        }
        if ($mail['email'] > 0) {
            //get salt data
            $salt       = $model->getSalt($email);
            $data       = array();
            foreach ($salt->getResult() as $row) {
                $data['hash'] = $row->salt;
            }
            //get password form table user
            $pass       = $model->getPw($email);
            foreach ($pass->getResult() as $row) {
                $data['getPw'] = $row->password;
                $data['level'] = $row->level;
            }
            $level = $data['level'];
            $pwd        = sha1($data['hash'] . $password);
            //check password
            if ($pwd == $data['getPw']) {
               $sendSession = $model->set_login($email,$level);
               if ($session->get('level') == '2') {
                   echo 'bisa pindah halaman';
               }
            }
        } else {
            $output = array('status' => "Email Failed", );
            echo json_encode($output);
        }
    }
}
;?>