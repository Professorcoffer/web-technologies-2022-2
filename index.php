<?php

// 1 задание
function firstTask() {
    $i = 0;

    do {
        if ($i == 0) {
            echo 'Это ноль' . '<br>';
        } else if ($i % 2 == 0) {
            echo $i . ' это четное число' . '<br>';
        } else {
            echo $i . ' это нечетное число' . '<br>';
        }
        $i++;
    } while ($i <= 10);
}

// 2 задание
function secondTask() {
    $districts = [
        'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
        'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    ];

    foreach ($districts as $district => $localities) {
        echo $district . ': <br>';
        foreach ($localities as $localityIndex => $locality) {
            echo $locality . ($localityIndex == count($localities) - 1 ? "." : ", ");
        }
        echo '<br>';
    }
}

// 3 задание
function thirdTask() {
    $abc = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g',
        'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',  'ь' => '`',
        'ы' => 'y`', 'ъ' => '``', 'э' => 'e`', 'ю' => 'yu',
        'я' => 'ya',

    ];

    function str_split_unicode($str, $l = 0) {
        if ($l > 0) {
            $ret = array();
            $len = mb_strlen($str, "UTF-8");
            for ($i = 0; $i < $len; $i += $l) {
                $ret[] = mb_substr($str, $i, $l, "UTF-8");
            }
            return $ret;
        }
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    }


    $str = 'Хорошие пельмени это очень-очень вкусно.';

    foreach (str_split_unicode($str) as $symbol) {
        $symbolToLowerCase = mb_strtolower($symbol, 'UTF-8');
        if (array_key_exists($symbolToLowerCase, $abc)) {
            if ($symbol == $symbolToLowerCase) {
                echo $abc[$symbol];
            } else {
                echo ucfirst($abc[$symbolToLowerCase]);
            }
        }
        else
            echo $symbol;
    }
}



// 4 задание
$menu = [
    [
        'title' => 'Главная',
        'link' => '/',
    ],
    [
        'title' => 'О нас',
        'link' => '/about-us',
    ],
    [
        'title' => 'Что-то ещё',
        'link' => 'other'
    ],
    [
        'title' => 'Подменю',
        'link' => '',
        'children' => [
            [
                'title' => 'Подменю1',
                'link' => '',
                'children' => [
                    [
                        'title' => 'Подменю1.1',
                        'link' => '',
                    ],
                    [
                        'title' => 'Подменю1.2',
                        'link' => '123',
                    ]
                ]
            ],
            [
                'title' => 'Подменю2',
                'link' => '',
            ]
        ]
    ]
];

function fourthTask($menu) {
    $res = '<ul>';
    foreach ($menu as $key => $value) {
        if(!array_key_exists('children', $value)) {
            $res .=
                $value['link'] ?
                    "<li><a href={$value['link']}> {$value['title']} </a></li>" :
                    "<li>{$value['title']}</li>";
        } else {
            // $res .= "<li>" . $value['title'] . fourthTask($value['children']) . "</li>";
            $res .= "<li>";
            $res .= array_key_exists('link', $value) && $value['link'] != '' ? "<a href={$value['link']}> {$value['title']} </a>" : $value['title'];
            $res .= fourthTask($value['children']) . "</li>";
        }
    }

    return $res . "</ul>";
}

echo fourthTask($menu);
?>