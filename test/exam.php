<link type="text/css" rel="stylesheet" href="../css/font/material-design-icons/mtsico.css" media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css"  media="screen,projection"/>
<script type="text/javascript" src="../css/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../css/js/materialize.js"></script>

    <form action="upload.php" method="post" enctype="multipart/form-data">

                            
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
        
       <?php /* <input type="submit" value="Upload Image" name="submit">*/ ?>
    </form>