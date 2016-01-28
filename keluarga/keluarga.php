
<?php
/* @var $que pdo */
/* @var $conn pdo */
require_once '../cklg.php';
require_once '../config.php';
$nip = $_REQUEST['nip'];
$sql = " select * from keluarga where nip = '$nip'";
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetchAll();
$sqlpeg = " select * from pegawai where nip = '$nip'";
$quepeg = $conn->prepare($sqlpeg);
$quepeg->execute();
$quepeg->setFetchMode(PDO::FETCH_OBJ);
$stque = $quepeg->fetch();




?>

<html>
    <head>

        <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="../css/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../css/js/materialize.js"></script>

        <title>Keluarga</title>
    </head>
    <body>


        <div class="container">
          <?php include "navbar.php" ?>
            <h4 class="header2">Data Keluarga</h4>


            <table class="highlight">
                <thead>
                  <tr>

                    <td colspan="4"> <a class="waves-effect waves-light btn" href="addkeluarga.php?nip=<?= $nip;?> ">Tambah Keluarga</a></td>

                    <td><a class="waves-effect waves-light btn" href="print.php?nip=<?= $nip;?> ">Print Data</a></td>
                  </tr>

                  <tr>
                    <td colspan="4"> Keluarga <?= $stque->nama ?> </td>

                  </tr>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th> Hubungan </th>
                        <th> Action </th>
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
                        <td><a href="keluargaall.php?id=<?= $q->id_kel;echo "&data=".$stque->nama ?>" > <?= $q->nama; ?> </a></td>
                        <td><?= $q->jk == 'L' ? 'Laki Laki' : 'Perempuan'; ?></td>
                        <td><?= $q->tgl_lahir; ?></td>
                        <td><?= $q->tmpt_lahir; ?></td>
                        <td><?= $q->hub; ?></td>
                        <td>
                            <a href="updatekeluarga.php?id=<?= $q->id_kel; ?>" > Edit </a>
                            |
                            <a href="proKeluarga.php?id=<?= $q->id_kel; ?>&action=del&nip=<?= $q->nip ?> "> Delete</a>

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







    </body>
</html>
