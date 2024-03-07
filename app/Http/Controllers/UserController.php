<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;

class UserController
{

    //show information about client(user)

    public function showInfoClient()
    {
        $infoClient = array(

            "ipClient: " => $_SERVER['REMOTE_ADDR'],
            "userAgentClient: " => $_SERVER['HTTP_USER_AGENT'],
        );


        echo "<pre>" . json_encode($infoClient, JSON_PRETTY_PRINT) . "</pre>";
    }

    //show information about server (php version)

    public function showInfoServer()
    {
        $infoServer = array(
            "versionPHP: " => phpversion(),
        );

        echo "<pre>" . json_encode($infoServer, JSON_PRETTY_PRINT) . "</pre>";
    }

    // show information about database

    public function showInfoDB()
    {
        $DB = array();

        //data for autorisation

        $servername = "localhost";
        $username = "root";
        $password = "";

        //connect

        $connect = mysqli_connect($servername, $username, $password);

        if (!$connect) {
            die("Connection error: " . mysqli_connect_error());
        }

        echo "Connection succes\n";
        
        $sql = "SHOW DATABASES";

        $res = mysqli_query($connect, $sql);

        //info about database

        while ($entry = mysqli_fetch_row($res)) {
            foreach ($entry as $value) {
                $DB[] = $value;
            }
        }

        mysqli_close($connect);

        echo "<pre>" . json_encode($DB, JSON_PRETTY_PRINT) . "</pre>";
    }
}
