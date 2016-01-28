
<?php
/* @var $que pdo */
/* @var $conn pdo */
require_once '../cklg.php';
require_once '../config.php';
$nip = $_GET['nip'];
$sql = " select * from Pegawai where nip = '$nip' ";
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetch();



?>

<html>
    <head>

        <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css"  media="screen,projection"/>


        <title>Update Pegawai</title>
    </head>
    <body>


        <div class="container">
          <?php include "navbar.php"; ?>
                    <h4 class="header2">Update Pegawai</h4>
                    <div class="row">
                        <form class="col s6" action="proPegawai.php?action=update&nip=<?= $stmt->nip ?>" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nip" type="text" name="nip" value="<?= $stmt->nip ?>" disabled>
                                <label for="nip" class="">NIP</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="text" name="nama" value="<?= $stmt->nama ?>" required>
                                <label for="email" class="">Nama</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <textarea id="message" class="materialize-textarea" name="alamat" required> <?= $stmt->alamat ?></textarea>
                                 <label for="message" class="">Alamat</label>
                                </div>
                            </div>
                            <div class="row">
                                <p> <input name="jk" type="radio" id="test1" value="L" <?php echo $stmt->jk=='L' ? 'checked' : ''; ?>/><label for="test1">Laki - Laki</label>
                                    <input name="jk" type="radio" id="test2"  value="P" <?php echo $stmt->jk=='P' ? 'checked' : ''; ?>/>
                                    <label for="test2">Perempuan</label>
                                </p>
                            </div>
                            <?php $agamaS = array('Islam','Protestan','Katolik','Hindu','Budha','Kong Hu Cu'); ?>
                            <div class="row">
                                <div class="input-field col s12">
                                <select name="agama" required>
                                    <?php
                                    foreach ($agamaS as $a){
                                        ?>

                                  <option value="<?=$a ?>" <?php echo $a==$stmt->agama ? 'selected' : ''; ?> > <?=$a ?></option>
                                    <?php } ?>
                                </select>
                                <label>Agama</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="date" class="datepicker" placeholder="Tanggal Lahir" value="<?= $stmt->tgl_lahir ?>" name="date" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                <input id="text" type="text" name="tmpt_lahir" value="<?= $stmt->tmpt_lahir ?>" required>
                                <label for="text" class="">Tempat Lahir</label>
                                </div>
                            </div>




                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
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
