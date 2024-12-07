<?php
function formatoCodigoPostal($codigoPostal) {
    $codigoPostal = str_replace(' ', '', $codigoPostal); 

    if (strlen($codigoPostal) < 5) {
        $codigoPostal = str_pad($codigoPostal, 5, '0', STR_PAD_LEFT);
    }

    return $codigoPostal;
}

$CodigoP = "12345";
echo formatoCodigoPostal($CodigoP);
?>