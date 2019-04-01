<?php
/*
Задание 3
Ключевые слова: strpos, substr, strlen, php mb
Написать код, который будет искать первое подходящее слово в заданной строке и выводить 10 символов слева и справа от неё через запятую.
Строка, в которой нужно искать: "Привет мир! Я лучший текст из всех, что ты когда-либо видел!";
Слова, которые нужно искать: "лучший", "Привет", "code", "видел";
Пример для слова "лучший": "ет мир! Я , текст из ".
Если нет слова - выводить "нет слова".
*/
$str="Привет мир! Я лучший текст из всех, что ты когда-либо видел!";
$find=[];
$find[]="лучший";
$find[]="Привет";
$find[]="code";
$find[]="видел";
foreach ($find as $f){
    $pos = strpos($str,$f);
    if ($pos===false){
        echo "слова нет"."\n";
    }
    else{
        //echo iconv_strlen($str)."\n";
        //echo $str{$pos-1}."\n";
        //echo $pos."\n";
        if ($pos-10<0){
            $left=substr($str,$pos);
        };
        $left=substr($str,$pos+strlen($f));
        echo  "Слева от найденного слова:'".substr($left,0,strlen($f))."'\n";
        $right=substr($str,0,$pos);
        if ($right===false){
    	   echo "слова нет"."\n";
    	}
        echo "Справа от найденного слова: '".substr($right,-strlen($f))."'\n";
        
    }
    //$left=substr($str,strpos($str,$f)-strlen($f)-10,10);
    //$right=substr($str,strpos($str,$f)+strlen($f),10);
    //echo $left.','.$right."\n";
}
