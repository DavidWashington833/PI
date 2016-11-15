<?php

foreach($imagem as $key => $value) {
    foreach($value as $key2 => $value2) {
        if($key2 == 2) {
            $bit = $value2;
        }
    } 
}

$bit = base64_encode($bit);
echo "<img src=\"data:image/jpeg;base64,".$bit."\">";
