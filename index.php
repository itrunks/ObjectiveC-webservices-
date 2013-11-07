<?php
    $sentUsername = $_POST['username'];
    $sentPW = $_POST['pw'];

    mysql_connect("localhost", "root","root") or die(mysql_error());   
    mysql_select_db("crm_local_db") or die(mysql_error());

    $result = mysql_query("SELECT * FROM local_crm") or die(mysql_error());  

    $authenticate = 0;

    while($authenticate == 0) {
        $row = mysql_fetch_array($result);
        $selectedUsername = $row['username'];
        $selectedPW = $row['password'];
        $pwComp = strcmp($sentPW, $selectedPW);
        $userComp = strcmp($selectedUsername, $sentUsername);

        if(!$row) break;
        if($selectedPW == $sentPW && $selectedUsername == $sentUsername) {
            $authenticate = 1;
        }
    }
    echo $authenticate;
?>