<?php

/*
Задание 1
Ключевые слова: argv, implode
Написать простой калькулятор, который обрабатывает простые примеры из командной строки.
Примеры могут содержать целые числа и знаки + и -. Числа и знаки отделяются пробелами.
Любые последовательности, которые не похожи на целое число, игнорируются.
Вывод осуществляется в следующем виде:
Решение: 1 + 2 + 3 - 4 = 2
Перевод в конце строки обязателен. Программа не должна выводить ничего лишнего.
Пример запуска:
php calc.php 1 + 2 + 3 + 4 - 1 + 2
Решение: 1 + 2 + 3 + 4 - 1 + 2 = 11
php calc.php 1 + 2 adsfasdf + 3 + 4 - 1 + 2
Решение: 1 + 2 + 3 + 4 - 1 + 2 = 11
*/


function isint($q){
    if (is_numeric($q)){
        return true;
    }
    else {
        return false;
    }
};

function isoperand($q){
    if (($q=="+") or ($q=="-")){
        return true;
    }
    else {
        return false;
    }
};

$handle = fopen('php://stdin', 'r');
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $list=explode(" ",$buffer);
        $str="";
        $ans=0;
        $elem=0;
        while (!isoperand($list[$elem])){
            if (isint($list[$elem])){
                $numb=$list[$elem];
            }
            $elem++;
        };

        $str=$numb." ";
        $ans+=$numb;
        for ($elem; $elem < sizeof($list); $elem++){

            if (isoperand($list[$elem])){
                $znak=$list[$elem];

            };
            if (isint($list[$elem+1])){
                $numb=$list[$elem+1];
            };

            if (isset($numb) and isset($znak)){
                $str.=$znak." ".$numb." ";
                if ($znak=='+'){
                    $ans+=$numb;
                }
                if ($znak=='-'){
                    $ans-=$numb;
                }
                unset($numb);
                unset($znak);
            }
        };

        echo $str."= ".$ans;
    }
    fclose($handle);
}
