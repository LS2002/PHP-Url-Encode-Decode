<?php

$string = "";

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        $content=$_GET["content"];
        add($content);
        break;
    default:
        exit();
}

function add($content)
{
    // $users=getCsvFile("example.csv");
    // $string="$content";
                                   
    // WriteLinetxt($content,"example.csv");
                                   
    $string=$string+"\n"+$content;
                                   
    header("Content-type:text/html");
    // print($string);
    echo $string;
                                   
}

?>
