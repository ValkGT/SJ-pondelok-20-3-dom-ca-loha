<?php

namespace main;

class Menu
{
    private $filePath = "source/headerMenu.json";

    public function getMenu(string $type): array
    {
        $menu = [];
        $isValid = $this->validateMenuType($type);

        if($isValid) {
            if($type === "header") {
                try {
                    $FileCsv ="source/menu.csv";
                    $f = fopen($FileCsv, "r");
                    $MenuCsv =[];
                    $file = fgetcsv($f, 50, ",");
                    while($file != FALSE){
                        $MenuCsv[$file [0]] = ["path" => $file[1],"name" => $file[2]];
                        $file =fgetcsv($f, 50, ",");
                    }
                        $menu = $MenuCsv;
                } catch (\Exception $exception) {
                    //echo $exception->getMessage();
                    $menu = [
                        'home' => [
                            'path' => 'index.php',
                            'name' => 'Domov',
                        ]
                    ];
                }
            }
        }

        return $menu;
    }

    public function printMenu(array $menu)
    {
        foreach ($menu as $key => $menuItem) {
            echo '<li><a href="'.$menuItem['path'].'">'.$menuItem['name'].'</a></li>';
        }
    }

    public function preparePortfolio(int $numberOfRows = 2, int $numberOfCols = 4): array
    {
        $portfolio = [];
        $colIndex = 1;

        for ($i = 1; $i <= $numberOfRows; $i++) {
            for ($j = 1; $j <= $numberOfCols; $j++) {
                $portfolio[$i][] = $colIndex;
                $colIndex++;
            }
        }

        return $portfolio;
    }

    private function validateMenuType(string $menuType): bool
    {
        $validTypes = [
            'header',
            'footer',
            'main'
        ];

        if(in_array($menuType, $validTypes)) {
            return true;
        } else {
            return false;
        }
    }
}