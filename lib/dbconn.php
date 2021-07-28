<?
    $connect=mysql_connect( "localhost", "skullbin", "Breakbone00") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("skullbin",$connect);
?>
