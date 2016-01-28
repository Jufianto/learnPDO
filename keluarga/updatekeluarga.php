<?php
require_once '../cklg.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../config.php';
$id = $_REQUEST['id'];
$sql = " select * from keluarga where id_kel = '$id' ";
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetch();


?>

<html>
    <head>

        <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css"  media="screen,projection"/>


        <title>Tambah Keluarga</title>
    </head>
    <body>


        <div class="container">
            <?php include "navbar.php" ?>
                    <h4 class="header2">Tambah Keluarga</h4>
                    <div class="row">
                        <form class="col s6" action="proKeluarga.php?id=<?= $id ?>&action=update" method="POST" enctype="multipart/form-data" >

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nip" type="text" name="nip" value="<?= $stmt->nip ?> " disabled>
                                    <input type="hidden" name="nip" value="<?= $stmt->nip ?>">
                                    <label for="nip" class="">NIP</label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nama" type="text" name="nama" value="<?= $stmt->nama ?>"  required>
                                <label for="nama" class="">Nama</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="date" class="datepicker" placeholder="Tanggal Lahir" value="<?= $stmt->tgl_lahir ?>" name="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nama" type="text" name="tmpt_lahir" value="<?= $stmt->tmpt_lahir ?>"  required>
                                <label for="nama" class="">Tempat Lahir</label>
                                </div>
                            </div>

                            <div class="row">
                              <p> <input name="jk" type="radio" id="test1" value="L" <?php echo $stmt->jk=='L' ? 'checked' : ''; ?>/><label for="test1">Laki - Laki</label>
                                  <input name="jk" type="radio" id="test2"  value="P" <?php echo $stmt->jk=='P' ? 'checked' : ''; ?>/>
                                  <label for="test2">Perempuan</label>
                              </p>
                            </div>


                            <?php $hubS = array('Ayah','Ibu','Istri','Anak','Adik','Kakak'); ?>
                            <div class="row">
                                <div class="input-field col s12">
                                <select name="hub" required>
                                    <?php
                                    foreach ($hubS as $a){
                                        ?>

                                  <option value="<?=$a ?>" <?php echo $a==$stmt->hub ? 'selected' : ''; ?> > <?=$a ?></option>
                                    <?php } ?>
                                </select>
                                <label>Hubungan</label>
                                </div>
                            </div>





                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="submit">Edit
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
                          </div>



                        </div>
                      </form>

        </div>





        <script type="text/javascript" src="../css/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../css/js/materialize.js"></script>
        <script>
             $(document).ready(function() {
             $('select').material_select();
             });

              $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 90, // Creates a dropdown of 15 years to control year
                format: 'dd/mm/yyyy',
                max:2015,
              });
        </script>
    </body>
</html>
