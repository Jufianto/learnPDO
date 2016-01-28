<?php
require_once '../cklg.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



?>

<html>
    <head>

        <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css"  media="screen,projection"/>


        <title>Tambah Pegawai</title>
    </head>
    <body>


        <div class="container">
                  <?php include "navbar.php"; ?>
                    <h4 class="header2">Tambah Pegawai</h4>
                    <div class="row">
                        <form class="col s6" action="proPegawai.php?action=add" method="POST" enctype="multipart/form-data" >

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="text" name="nama" required>
                                <label for="email" class="">Nama</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <textarea id="message" class="materialize-textarea" name="alamat" required></textarea>
                                 <label for="message" class="">Alamat</label>
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
                                <select name="agama" required>
                                  <option value="islam">Islam</option>
                                  <option value="protestan">Protestan</option>
                                  <option value="katolik">Katolik</option>
                                  <option value="hindu">Hindu</option>
                                  <option value="budha">Budha</option>
                                  <option value="konghucu">Kong Hu Cu</option>
                                </select>
                                <label>Agama</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                <input type="date" class="datepicker" placeholder="Tanggal Lahir" name="date" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                <input id="text" type="text" name="tmpt_lahir" required>
                                <label for="text" class="">Tempat Lahir</label>
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
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="submit">Daftar
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
