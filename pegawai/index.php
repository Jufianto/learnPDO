
<?php
/* @var $que pdo */
/* @var $conn pdo */
require_once '../config.php';
require_once '../cklg.php';
$cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';
if ($cari == ""){
  $sql = " select * from pegawai";
}else {
  # code...
  $sql = "select * from pegawai where nama like '%$cari%'";
}

$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetchAll();




?>

<html>
    <head>

        <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="../css/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../css/js/materialize.js"></script>

        <title>Pegawai</title>
    </head>
    <body>


        <div class="container">
           
            <?php include "navbar.php" ?>
            <h4 class="header2">Data Pegawai</h4>
            <div class="row">
              <div class="col s9"> <a class="waves-effect waves-light btn" href="addpegawai.php">Tambah Pegawai</a> </div>
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
              <div class="col s3"> <input type="text" name="cari" placeholder="Cari Pegawai" value= "<?= $cari ?>"> </div>
              </form>
            </div>
            <table class="highlight">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                        <th> Keluarga </th>
                     </tr>
                </thead>
                <tbody >
                    <?php
                    if(isset($_GET['act'])){
                    if($_GET['act'] == 'del')
                    {
                      ?>
                      <script>
                        var $toastContent = $('<span>Data Berhasil Di Delete</span>');
                        Materialize.toast($toastContent, 5000);
                      </script>
                      <?php
                    } elseif ($_GET['act'] == 'update') {
                      ?>
                      <script>
                        var $toastContent = $('<span>Data Berhasil Di Edit</span>');
                        Materialize.toast($toastContent, 5000);
                      </script>
                      <?php
                    }elseif($_GET['act'] == 'add'){
                      ?>
                      <script>
                        var $toastContent = $('<span>Data Berhasil Di Tambah</span>');
                        Materialize.toast($toastContent, 5000);
                      </script>
                      <?php
                    }
                  }


                    $no = 0;
                    foreach ($stmt as $q)
                    {
                        $no++;

                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td> <a href="pegawaial.php?nip=<?= $q->nip; ?>"><?= $q->nip; ?></a></td>
                        <td><?= $q->nama; ?></td>
                        <td><?= $q->jk == 'L' ? 'Laki Laki' : 'Perempuan'; ?></td>
                        <td>
                            <a href="updatepegawai.php?nip=<?= $q->nip; ?>" > Edit </a>
                            |
                            <a href="proPegawai.php?nip=<?= $q->nip; ?>&action=del"> Delete</a>

                        </td>
                        <td>

                          <?php
                            $sqlkel = "select * from keluarga where nip = '$q->nip' ";
                            $qkel = $conn->prepare($sqlkel);
                            $qkel->execute();
                            $count = $qkel->rowCount();
                            if ($count > 0)
                            {
                              ?> <a href="../keluarga/keluarga.php?nip=<?= $q->nip; ?>" > Data keluarga </a> <?php

                            }else {
                                ?> <a href="../keluarga/addkeluarga.php?nip=<?= $q->nip; ?>"> Tambah keluarga </a> <?php

                            }
                           ?>


                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <hr>
            <br>
            <!--
            <ul class="pagination">
              <li class="active"><a href="#!">1</a></li>
              <li class="waves-effect"><a href="#!">2</a></li>
              <li class="waves-effect"><a href="#!">3</a></li>
              <li class="waves-effect"><a href="#!">4</a></li>
              <li class="waves-effect"><a href="#!">5</a></li>
            </ul>
          -->

        </div>





      <!--  <script type="text/javascript" src="../css/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../css/js/materialize.js"></script> -->

    </body>
</html>
