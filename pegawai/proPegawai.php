<?php
/* @var $que pdo */
/* @var $conn pdo */
 include "ctPegawai.php";
 require_once '../config.php';





if($_SERVER['REQUEST_METHOD'] === 'POST')
 {
    switch ($_GET['action']){
    case "add":
    $nama  = $_REQUEST['nama'];
    $alamat= $_REQUEST['alamat'];
    $jk    = $_REQUEST['jk'];
    $agama = $_REQUEST['agama'];
    $tgl_la= $_REQUEST['date'];
    $tmp_la= $_REQUEST['tmpt_lahir'];
    $nip = randNip($tgl_la);
    $namafoto = basename($_FILES["fileToUpload"]["name"]);
    $splname = explode(".", $namafoto);
    $newnip = "$nip.$splname[1]";
    //$foto = basename($_FILES["fileToUpload"]["name"]);
    $sql = "insert into Pegawai values ('$nip','$nama','$alamat','$jk','$agama','$tgl_la','$tmp_la','$newnip')";
    $que = $conn->prepare($sql);
    include "upload.php";
     if(($que->execute()) && ($uploadOk == 1))
         {

            //echo "suskses";
            header('location:index.php?act=add');
         }else{
            $que->errorInfo();
        }
        break;
    case "update":
        $nip   = $_REQUEST['nip'];
        $nama  = $_REQUEST['nama'];
        $alamat= $_REQUEST['alamat'];
        $jk    = $_REQUEST['jk'];
        $agama = $_REQUEST['agama'];
        $tgl_la= $_REQUEST['date'];
        $tmp_la= $_REQUEST['tmpt_lahir'];

        $sql = "update Pegawai set nama='$nama',alamat='$alamat',jk='$jk',agama='$agama',tgl_lahir='$tgl_la',tmpt_lahir='$tmp_la' where nip = '$nip'";
        $que = $conn->prepare($sql);
                if($que->execute())
                {

                   header('Location:index.php?act=update');
                    }else{
                       $que->errorInfo();
                   }
     break;
    }


 }else if($_SERVER['REQUEST_METHOD'] === 'GET')
 {
         if(isset($_GET["action"]) && isset($_GET["nip"]))
            {
                $sql="DELETE FROM Pegawai WHERE nip='".$_GET['nip']."'";
                $que = $conn->prepare($sql);
                $sq = "select * FROM Pegawai WHERE nip='".$_GET['nip']."'";
                $q = $conn->prepare($sq);
                $q->execute();
                $q->setFetchMode(PDO::FETCH_OBJ);
                $stmt = $q->fetch();

                if($que->execute())
                {
                    if($stmt->foto != ""){
                      unlink($stmt->foto);
                      }
                    header("Location:index.php?act=del");

                }
                else
                {
                    echo "kesalahan query";
                }
            }
 }
