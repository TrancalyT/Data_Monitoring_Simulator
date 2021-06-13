<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class CommonDAO
{
    function connectionDB()
    {
        $db = new mysqli("localhost", "root", "", "test_webreathe");
        return $db;
    }
}

?>
