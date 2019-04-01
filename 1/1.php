<?php

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

$filter=[];
foreach ($argv as $args){
        if (isoperand($args) or isint($args)){
            $filter[]=$args;
        }
}

$str = '';
$answer = 0;
foreach ($filter as $key=>$el){
    if ($key==0 and isint($el)){
        $str=$el." ";
        $answer=$el;
    }else{
        if (isint($el) and isoperand($filter[$key-1])){
            if ($filter[$key-1]=="+"){
                $answer+=$el;
            }
            else{
                $answer-=$el;
            }
            $str.=$filter[$key-1]." ".$el." ";
        }

    }
}
if ($str == ""){
    echo "Среди введённых данных нет целых чисел"."\n";
}
else{
    echo "Решение: ".$str."= ".$answer."\n";
}
