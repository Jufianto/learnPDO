<?php
$target_dir = "../foto/";
if(isset($_REQUEST['id'])) { $id = $_REQUEST['id']; $kel=$_REQUEST['data']; }else{ $id; }
if(isset($_POST['ok']))
{
   require_once '../config.php';
   $id = $_REQUEST['id'];
   $sql = " select * from keluarga where id_kel='$id'";
   $que = $conn->prepare($sql);
   $que->execute();
   $que->setFetchMode(PDO::FETCH_OBJ);
   $stmt = $que->fetch();
   //unlink($target_file);
    $target_file = $target_dir . $stmt->foto ;
    if($stmt->foto == "") {
        $data = rand(1111,9999);
        $namafoto = basename($_FILES["fileToUpload"]["name"]);
        $splname = explode(".", $namafoto);
        $newname = "$stmt->nip&$stmt->hub&$data.$splname[1]";
        $target_file = $target_dir . $newname;
        $sqlup = "update keluarga set foto='$newname' where id_kel='$id'";
        $queup = $conn->prepare($sqlup);
        $queup->execute();

    } elseif (file_exists($target_file))
        {
            $data = rand(1111,9999);
            unlink($target_file);
            $namafoto = basename($_FILES["fileToUpload"]["name"]);
            $splname = explode(".", $namafoto);
            $newname = "$stmt->nip&$stmt->hub&$data.$splname[1]";
            $target_file = $target_dir . $newname;
            $sqlup = "update keluarga set foto='$newname' where id_kel='$id'";
            $queup = $conn->prepare($sqlup);
            $queup->execute();
        }
}else{
    $target_file = $target_dir . $newname ;
}


//$nama = basename($_FILES["fileToUpload"]["name"]);
//$splname = explode(".", $nama);
//$nip = "323232";
//$newnip = "$nip.$splname[1]";



//echo "$newnip";

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists

// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      header("location:keluargaall.php?id=$id&data=$kel");

        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
