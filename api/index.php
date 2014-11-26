<?php
switch ($_GET['action']) {
    case "add":
    if(isset($_POST['idnya'])){
        require_once 'include/DB_Functions.php';
        $db = new DB_Functions();

        $response = array();


        $idnya = $_POST['idnya'];


        $daftar = $db->addID($idnya,"admin");

        if($daftar == false){
            $response["errorcode"] = 1001;
            $response["msg"] = "Data Incorrect or not complete!";
            echo json_encode($response);
        } else {
            $response["errorcode"] = 0;
            $response["msg"] = "ID anda berhasil dikonfirmasi!";
            echo json_encode($response);
        }
    } else {
        $response["errorcode"] = 1000;
        $response["msg"] = "ID anda belum terdaftar!";
        echo json_encode($response);
    }
    break;
    default:
    echo "Welcome to REST API Service E-Posyandu . If you want to use this API contact ramazeta1997@gmail.com";
    break;
}
?>