<?php
    
    $user = 'user';
    $password = 'pass';
    $host = 'host';
    $port = 1608;
    $database = 'db';

    $con = oci_connect($user, $password, $host . ':' . $port . '/' . $database);
    if (!$con) {
        $error = oci_error();
        trigger_error(htmlentities($error['message'], ENT_QUOTES), E_USER_ERROR);
    }else{
        echo "<h4> Conectado com odb: $database </h4>";
    }



    //Rodando uma stored procedure
    $p1 = 'teste';
    $p2 = '123';

    //p3 e p4 são parametros de saída

    $stid = oci_parse($con, 'begin procedureName(:p1, :p2, :p3, :p4); end;');

    oci_bind_by_name($stid, ':p1', $p1);
    oci_bind_by_name($stid, ':p2', $p2);
    oci_bind_by_name($stid, ':p3', $p3, 40);
    oci_bind_by_name($stid, ':p4', $p4, 40);

    oci_execute($stid);

    print "$p3\n";
    print "$p4\n";

?>
