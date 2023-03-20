<?php
$FileCsv ="source/menu.csv";
$f = fopen($FileCsv, "r");
$MenuCsv =[];
$file = fgetcsv($f, 50, ",");
while($file != FALSE){
    $MenuCsv[$file [0]] = ["path" => $file[1],"name" => $file[2]];
    $file =fgetcsv($f, 50, ",");
}

?>