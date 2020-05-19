<?php

function getArg (){


    if ($_POST['arg1'] && $_POST['arg1'] != '0') {
        $arg1 = (int)strip_tags($_POST['arg1']);
    } else{
        $arg1 = (int)0;
    };
    if ($_POST['arg2']&& $_POST['arg2'] != '0') {
        $arg2 = (int)strip_tags($_POST['arg2']);
    }else{
        $arg2 = (int)0;
    };


    if($_POST['operator'] == '+') {
        $res = $arg1 + $arg2;
        echo "</p>{$arg1}{$_POST['operator']}{$arg2}=<b>{$res}</b></p>";
    };

    if($_POST['operator'] == '-') {
        $res = $arg1- $arg2;
        echo "</p>{$arg1}{$_POST['operator']}{$arg2}=<b>{$res}</b></p>";
    };

    if($_POST['operator'] == '*') {
        $res = $arg1 * $arg2;
        echo "</p>{$arg1}{$_POST['operator']}{$arg2}=<b>{$res}</b></p>";
    };

    if($_POST['operator'] == '/' && $arg2 == 0) {
        echo 'На ноль делить недьзя';
    } elseif ($_POST['operator'] == '/'){
        $res = $arg1 * $arg2;
        echo "</p>{$arg1}{$_POST['operator']}{$arg2}=<b>{$res}</b></p>";
    };


}
