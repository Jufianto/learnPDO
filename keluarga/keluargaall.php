
<?php
/* @var $que pdo */
/* @var $conn pdo */
require_once '../cklg.php';
require_once '../config.php';
$id = $_REQUEST['id'];
$kel = $_REQUEST['data'];
$sql = " select * from keluarga where id_kel = '$id'";
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetch();





?>

<html>
    <head>

        <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css"  media="screen,projection"/>
        <style>
       #upload_link{
            text-decoration:none;
        }
       #upload{
            display:none;
        }
        #stupload {
            display: none;
        }
        </style>


        <title>Keluarga</title>

    </head>
    <body>


        <div class="container">
          <?php include "navbar.php" ?>
            <div class="row">
                <div class="col s4">
                  <div class="card">
                    <div class="card-image">
                        <img src="../foto/<?= $stmt->foto; ?>">

                    </div>
                      <form action="upload.php?id=<?= $stmt->id_kel;echo "&data=".$_REQUEST['data']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-action">
                        <input id="upload" type="file" name="fileToUpload"/>
                        <a href="" id="upload_link">Change Foto</a>
                        <input type="submit" name="ok" value="Upload" id="stupload">
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col s8">
            <h4 class="header2">Data Keluarga <?= $kel ?></h4>
            <table class="highlight responsive-table">

                    <tr>
                        <td class="col s3" >Nama : </td>
                        <td><?= $stmt->nama; ?></td>
                    </tr>
                    <tr>
                        <td class="col s2" >Tanggal Lahir : </td>
                        <td><?= $stmt->tgl_lahir; ?></td>
                    </tr>
                    <tr>
                        <td class="col s2" >Tempat Lahir : </td>
                        <td><?= $stmt->tmpt_lahir; ?></td>
                    </tr>
                    <tr>
                        <td class="col s2" >Jenis Kelamin : </td>
                        <td><?= $stmt->jk == 'L' ? 'Laki Laki' : 'Perempuan'; ?></td>
                    </tr>
                    <tr>
                        <td class="col s2" >Hubungan : </td>
                        <td><?= $stmt->hub; ?></td>
                    </tr>

                    <tr>
                        <td class="col s2" >Action : </td>
                        <td>
                          <a href="updatekeluarga.php?id=<?= $stmt->id_kel; ?>" > Edit </a>
                          |
                          <a href="proKeluarga.php?id=<?= $stmt->id_kel; ?>&action=del&nip=<?= $stmt->nip ?> "> Delete</a>

                        </td>
                    </tr>


            </table>
                </div>
        </div>
        </div>





        <script type="text/javascript" src="../css/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../css/js/materialize.js"></script>
        <script>

             $(function(){
                $("#upload_link").on('click', function(e){
                    e.preventDefault();
                    $("#upload:hidden").trigger('click');
                    $("#stupload:hidden").css('display','inherit');
                });
                });

        </script>
    </body>
</html>
