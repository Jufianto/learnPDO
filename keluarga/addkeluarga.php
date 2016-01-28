<?php
require_once '../cklg.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nip = $_REQUEST['nip'];

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
                        <form class="col s6" action="proKeluarga.php?nip=<?= $nip ?>&action=add" method="POST" enctype="multipart/form-data" >

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nip" type="text" name="nip" value="<?= $nip ?> " disabled>
                                    <label for="nip" class="">NIP</label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nama" type="text" name="nama" required>
                                <label for="nama" class="">Nama</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nama" type="text" name="tmpt_lahir" required>
                                <label for="nama" class="">Tempat Lahir</label>
                                </div>
                            </div>

                            <div class="row">
                                <p> <input name="jk" type="radio" id="test1" value="L"  checked/><label for="test1">Laki - Laki</label>
                                    <input name="jk" type="radio" id="test2"  value="P"/>
                                    <label for="test2">Perempuan</label>
                                </p>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <select name="hub" required>
                                  <option value="Ayah">Ayah</option>
                                  <option value="Ibu">Ibu</option>
                                  <option value="Istri">Istri</option>
                                  <option value="Anak">Anak</option>
                                  <option value="Adik">Adik</option>
                                  <option value="Kakak">Kakak</option>
                                </select>
                                <label>Hubungan</label>
                                </div>
                            </div>


                            <div class="row">

                                <div class="file-field input-field">
                                <div class="btn">
                                  <span>Foto</span>
                                  <input type="file" name="fileToUpload" id="foto" required>
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text"required >
                                </div>
                                </div>
                            </div>


                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="submit">Tambah
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
                selectYears: 60, // Creates a dropdown of 15 years to control year
                format: 'dd/mm/yyyy',
                max:2015,
              });
        </script>
    </body>
</html>
