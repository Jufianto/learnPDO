<?php
require_once '../cklg.php';
require_once "../config.php";
$nip = $_REQUEST['nip'];
$sql = "select * from keluarga where nip = $nip";
$sqlpe = "select * from pegawai where nip = $nip";
$qupe = $conn->prepare($sqlpe);
$qupe->execute();
$qupe->setFetchMode(PDO::FETCH_OBJ);
$stpe = $qupe->fetch();
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetchAll();
 ?>
 <html>
 <head><title>Print Data </title>
<style>
body {
  margin: auto;
  width: 960px;
}
h1 {margin-top:40px;}
table , th ,td{
margin-top: 20px;

border-collapse: collapse;
}
.tb{
border: 1px solid black;
}
th,td{
  padding:5px;
}
.pd{
  padding-right: 80px;
}
</style>
 </head>
 <body>
   <h1 align="center"> Data Keluarga <?= $stpe->nama; ?> </h1>
   <table>

   <tr>
   <td>NIP</td><td>:</td><td class="pd"><?= $stpe->nip; ?></td>

   <td>Agama</td><td>:</td><td><?= $stpe->agama; ?></td>
   </tr>
   <tr>
     <td>Nama</td><td>:</td><td><?= $stpe->nama; ?></td>
      <td>Tanggal Lahir</td><td>:</td><td><?= $stpe->tgl_lahir; ?></td>
   </tr>
   <tr>
     <td>Alamat</td><td>:</td><td><?= $stpe->nama; ?></td>

      <td>Tempat Lahir</td><td>:</td><td><?= $stpe->tmpt_lahir; ?></td>
   </tr>
   <tr>
     <td>Jenis Kelamin</td><td>:</td><td><?= $stpe->jk == 'L' ? 'Laki Laki' : 'Perempuan'; ?></td>
   </tr>

   </table>

   <table class="tb" border="1">
     <tr>
       <th>No </th>
       <th>Nama Keluarga</th>
       <th>Jenis Kelamin</th>
       <th>Tanggal lahir</th>
       <th>Tempat Lahir</th>
       <th>Hubungan</th>
     </tr>
         <?php
         $no=1;
         foreach ($stmt as $q) {
           # code...

          ?>
       <tr>
         <td><?= $no++; ?></td>
         <td><?= $q->nama ?></td>
         <td><?= $q->jk == 'L' ? 'Laki Laki' : 'Perempuan'; ?></td>
         <td><?= $q->tgl_lahir ?></td>
         <td><?= $q->tmpt_lahir ?></td>
         <td><?= $q->hub ?></td>
       </tr>
         <?php }
         ?>

   </table>
   <META http-equiv="refresh" content="1;URL=http://localhost/tiweb/keluarga/keluarga.php?nip=<?=$stpe->nip ?>">

<script>

window.print();

</script>

 </body>
 </html>
