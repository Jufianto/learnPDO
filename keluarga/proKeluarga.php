<?php
/* @var $que pdo */
/* @var $conn pdo */
 require_once '../config.php';





if($_SERVER['REQUEST_METHOD'] === 'POST')
 {
    switch ($_GET['action']){
    case "add":
    $nama  = $_REQUEST['nama'];
    $nip= $_REQUEST['nip'];
    $jk    = $_REQUEST['jk'];
    $tmpt_lahir    = $_REQUEST['tmpt_lahir'];
    $hub = $_REQUEST['hub'];
    $namafoto = basename($_FILES["fileToUpload"]["name"]);
    $splname = explode(".", $namafoto);
    $newname = "$nip&$hub.$splname[1]";
    //$foto = basename($_FILES["fileToUpload"]["name"]);
    $sql = "insert into keluarga (nip,nama,jk,tmpt_lahir,hub,foto) values ('$nip','$nama','$jk','$tmpt_lahir','$hub','$newname')";
    $que = $conn->prepare($sql);
    include "upload.php";
     if(($que->execute()) && ($uploadOk == 1))
         {

            //echo "suskses";
            header("location:keluarga.php?nip=$nip&act=add");

         }else{
            $que->errorInfo();
        }
        break;
    case "update":
    $nip= $_REQUEST['nip'];
    $nama  = $_REQUEST['nama'];
    $tgl_lahir  = $_REQUEST['tgl_lahir'];
    $id = $_REQUEST['id'];
    $jk    = $_REQUEST['jk'];
    $tmpt_lahir    = $_REQUEST['tmpt_lahir'];
    $hub = $_REQUEST['hub'];

        $sql = "update keluarga set nama='$nama',jk='$jk',tgl_lahir='$tgl_lahir',tmpt_lahir='$tmpt_lahir',hub='$hub' where id_kel = '$id'";
        $que = $conn->prepare($sql);
                if($que->execute())
                {

                   header("Location:keluarga.php?nip=$nip&act=update");
                    }else{
                       $que->errorInfo();
                   }
     break;
    }


 }else if($_SERVER['REQUEST_METHOD'] === 'GET')
 {
         if(isset($_GET["action"]) && isset($_GET["id"]) )
            {
                $sql="DELETE FROM keluarga WHERE id_kel='".$_GET['id']."'";
                $que = $conn->prepare($sql);
                $sq = "select * FROM keluarga WHERE id_kel='".$_GET['id']."'";
                $q = $conn->prepare($sq);
                $q->execute();
                $q->setFetchMode(PDO::FETCH_OBJ);
                $stmt = $q->fetch();
                if($stmt->foto != "" ){
                unlink("../foto/".$stmt->foto);
                echo "succes";
                }
                if($que->execute())
                {
                    $nip = $_GET['nip'];


                    header("Location:keluarga.php?nip=$nip&act=del");

                }
                else
                {
                    echo "kesalahan query";
                }
            }
 }
