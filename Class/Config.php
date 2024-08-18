<?php
session_start();
include(dirname(__DIR__).'/Class/Main.php');

if( ($_SERVER['HTTP_HOST']) == 'localhost')
    {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'course';    
    }
    else
    {
            $db_host = 'localhost';
            $db_user = 'bhart_avi_user';
            $db_pass = '4(TTZ~37dSR(';
            $db_name = 'Bhrit_Avi_DB';
    }


// Connection
$Uni = new MysqliDb(
            Array (
                'host'      => $db_host,
                'username'  => $db_user, 
                'password'  => $db_pass,
                'db'        => $db_name,                
                'prefix'    => 'course_',
                'charset'   => 'utf8'
            ));

?>