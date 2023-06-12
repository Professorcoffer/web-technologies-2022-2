<!-- 1 задание -->

<?php
$a = 12;
$b = 40;

function firstScript(float $first, float $second) {
    if ($first >= 0 && $second >= 0) {
        return $first - $second;
    } elseif ($first < 0 && $second < 0) {
        return $first * $second;
    } else {
        return $first + $second;
    }
}

echo firstScript($a, $b);
?>

<!-- 2 задание -->

<?php
function secondScriptVar1(int $a) {
    switch ($a) {
        case ($a <= 15):
            for ($i = $a; $i <= 15; $i++) {
                print_r($i . " ");
            }
            break;
    }
}

function secondScriptVar2(int $a) {
    switch ($a) {
        case 0:
            print_r('0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15');
            break;
        case 1:
            print_r('1 2 3 4 5 6 7 8 9 10 11 12 13 14 15');
            break;
        case 2:
            print_r('2 3 4 5 6 7 8 9 10 11 12 13 14 15');
            break;
        case 3:
            print_r('3 4 5 6 7 8 9 10 11 12 13 14 15');
            break;
        case 4:
            print_r('4 5 6 7 8 9 10 11 12 13 14 15');
            break;
        case 5:
            print_r('5 6 7 8 9 10 11 12 13 14 15');
            break;
        case 6:
            print_r('6 7 8 9 10 11 12 13 14 15');
            break;
        case 7:
            print_r('7 8 9 10 11 12 13 14 15');
            break;
        case 8:
            print_r('8 9 10 11 12 13 14 15');
            break;
        case 9:
            print_r('9 10 11 12 13 14 15');
            break;
        case 10:
            print_r('10 11 12 13 14 15');
            break;
        case 11:
            print_r('11 12 13 14 15');
            break;
        case 12:
            print_r('12 13 14 15');
            break;
        case 13:
            print_r('13 14 15');
            break;
        case 14:
            print_r('14 15');
            break;
        case 15:
            print_r('15');
            break;
    }
}

secondScriptVar1(15);
?>

<!-- 3 задание -->

<?php

function operatorPlus($first, $second) {
    return $first + $second;
}

function operatorMinus($first, $second) {
    return $first - $minus;
}

function operatorMultiply($first, $second) {
    return $first * $second;
}

function operatorDivision($first, $second) {
    return $first / $second;
}

?>

<!-- 4 задание -->

<br>
<?php

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            return $arg1 + $arg2;
        case '-':
            return $arg1 - $arg2;
        case '*':
            return $arg1 * $arg2;
        case '/':
            return $arg1 / $arg2;
    }
}
?>

<!-- 5 задание -->

<!-- 1-й способ - данные и верстка в одном файле. В таком случае переменные распознаются -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>
<body>
  <h1> <?= $firstHeader ?> </h1>
  <span> <?= $year ?> </span>


  <h4>Практика 17 пункт 5. Вывод даты разными способами:</h4>
  <div>
    <?= $date ?>
  </div>

</body>
</html> -->

<?
$title = "Title";
$firstHeader = "First header";
$year = "2023";


// 2-й способ - подключение php файла с версткой через required
$date =  date('H:i', time());
// require('task.php');

// 3-ий способ - подключение html файла с версткой и заменой переменных через str_replace
$content = file_get_contents('task.html');
$content = str_replace("{{ date }}", $date, $content);
$content = str_replace("{{ title }}", $title, $content);

echo $content;
?>

<!-- 6 задание -->

<br>
<?php
function power($val, $pow) {
    return $pow == 0 ? 1 : power($val, $pow - 1) * $val;
}

echo power(3, 4);
?>
