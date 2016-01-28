<?php
 ?>

 <nav style="margin-top:10px">
     <div class="nav-wrapper teal">
       <ul id="nav-mobile" class="right hide-on-med-and-down">
         <li><a href="index.php">Data pegawai</a></li>
         <li><a href="Keluarga.php?nip=<?php if(isset($_REQUEST['nip'])) { echo $_REQUEST['nip']; } else { echo $stmt->nip; }  ?>">Data Keluarga</a></li>

         <li><a href="../logout.php">Logout</a></li>

       </ul>
     </div>
   </nav>
