<?php
require_once '../config.php';


function getData($sql)
{
    $stmt = $conn->prepare($sql);
    $stmt->excecute;
    print_r($stmt);
}

function randNip($tgl)
    {
        $spdate = explode("/", $tgl);
        $th = substr($spdate[2], 2);
        srand($th.$spdate[0]);
        $rand = rand();
        $rand = substr($rand, 0 , 6);
        $rand1 = rand(100, 900);
        return $nip = $th.$spdate[1].$spdate[0].$rand1.$rand;
        
    }
