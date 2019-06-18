<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    public function cekEmail($email)
    {
        $sql = $this->db->query('SELECT COUNT(*) as total FROM user WHERE email="' . $email . '"');
        return $sql;
    }

    public function regis($id, $name, $email, $password, $dateofbirth, $address, $level, $status)
    {
        $data = array(
            "user_id" => $id,
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "dateofbirth" => $dateofbirth,
            "address" => $address,
            "level" => $level,
            "status" => $status,
        );
        $builder = $this->db->table('user')->insert($data);
        return true;
    }

    public function getrand($panjang, $char)
    {
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
            # code...
            $pos = rand(0, strlen($char) - 1);
            $string .= $char{$pos};
        }

        return $string;
    }

    public function saveSalt($email, $salt1)
    {
        $builder = $this->db->table('salt');
        $data = array(
            "email" => $email,
            "salt" => $salt1,
        );
        $builder->insert($data);
        return true;
    }
    public function getSalt($email)
    {
        $builder = $this->db->query("SELECT * FROM salt WHERE email='$email'");
        return $builder;
    }
    public function getPw($email)
    {
        $builder = $this->db->query("SELECT * FROM user WHERE email='$email'");
        return $builder;
    }

    public function set_login($email, $level)
    {
        $session = \Config\Services::session();
        $session->start();
        $userdata = array(
            "email" => $email,
            "level" => $level,
        );
        $session->set($userdata);
    }

}

;
