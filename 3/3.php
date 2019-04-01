<?php

$str="Привет мир! Я лучший текст из всех, что ты когда-либо видел!";
//$find=[];
//$find[]="лучший";
//$find[]="Привет";
//$find[]="code";
//$find[]="видел";
    $f=$argv[1];
    $pos = strpos($str,$f);
    if ($pos===false){
        echo "слова нет"."\n";
    }
    else{
        if ($pos-10<0){
            $right=substr($str,$pos);
        };
        $right=substr($str,$pos+strlen($f));
        $left=substr($str,0,$pos);
        echo  mb_substr($left,-10).','.mb_substr($right,0,10)."\n";

    }
