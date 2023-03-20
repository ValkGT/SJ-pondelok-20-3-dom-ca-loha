<?php

$menu = [
    'home' => [
        'path' => 'index.php',
        'name' => 'Domov',
    ],
    'portfolio' => [
        'path' => 'portfolio.php',
        'name' => 'Portfólio',
    ],
    'faq' => [
        'path' => 'qna.php',
        'name' => 'Q&A',
    ],
    'contact' => [
        'path' => 'kontakt.php',
        'name' => 'Kontakt',
    ],
];

$menuJson = json_encode($menu);
file_put_contents("source/menu.json", $menuJson);

$csvFile = fopen("source/menu.csv", "w");
$Kategory = ["nazov","Path", "Name"];
fputcsv($csvFile, $Kategory);

foreach ($menu as $key => $item) {
    $list=[$key,$item["path"],$item["name"]];
    fputcsv($csvFile, $list);
}


fclose($csvFile);


?>