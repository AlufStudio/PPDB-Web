<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    //Buat anak
    public function addAnak($nama_anak,$nama_ortu,$jk,$tgl){
        $result = mysql_query("INSERT INTO anak(nama_ortu,nama_anak,jk,tgl) VALUES ('$nama_ortu','$nama_anak','$jk','$tgl')");

        if($result){
            return true;
        } else
            return false;
    }

    public function addID($idnya){
        $result = mysql_query("INSERT INTO konfirmasi(code_konfirmasi,admin) VALUES ('$idnya','$admin')")
        if($result)
            return true;
        else
            return false;
    }

    public function getAllTips($type){
        if($type == ""){
            $result = mysql_query("SELECT * FROM tips") or die(mysql_error());
        } else {
            $result = mysql_query("SELECT * FROM tips WHERE type = '$type'") or die(mysql_error());
        }

        $no_of_rows = mysql_num_rows($result);
        if($no_of_rows > 0){
            
            $data = array();
            while($result = mysql_fetch_array($result)){
                $data[] = array('id_tips' => $result["id_tips"],'title' => $result["title"],'content' => $result["content"], 'gambar' => $result["gambar"], 'waktu' => $result["waktu"], 'admin' => $result["admin"]);
            }
            return $data;
        } else {
            return false;
        }
    }


    public function getUserbyEAP($email, $password) {
        $result = mysql_query("SELECT * FROM user WHERE email = '$email' AND pass = '$password'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            $result["session"] = $this->generateRandomString($result['motto']);
            mysql_query("UPDATE user SET session = '".$result["session"]."' WHERE id_user = ".$result["id_user"]);
            
            return $result;
        } else {
            // user not found
            return false;
        }
    }

    public function logoutUser($session) {
        $result = mysql_query("UPDATE user SET session = '' WHERE session = '$session'");
        if (mysql_affected_rows() > 0) {
            return true;
        } else {
            // user not found
            return false;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }

    public function isSessionMatch($session) {
        $result = mysql_query("SELECT session from user WHERE session = '$session'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }




    public function generateRandomString($motto = "") {

    return md5(uniqid(trim($motto), true));
    }

}

?>
