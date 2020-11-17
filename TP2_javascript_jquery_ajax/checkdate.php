<?php
    header('Content-type: text/html; charset=iso-8859-1');
    //vorher ein Pregmatch machen -> siehe Lsg von Prof createfromforamat
    list($day, $month, $year) = explode("/", $_GET["date"]);
    if (checkdate(intval($month), intval($day), intval($year)))
        echo 1;
    else
        echo 0;
?>