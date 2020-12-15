<?php


ob_start();
define('DEBUG','FALSE');
include('credentials.php');

//remember - this is placed at the end of your config file 
function myerror($myfile, $myline, $errormsg) {
     if(defined('DEBUG') && DEBUG) {
         echo 'Error in file: <b>'.$myfile.' </b> on line: <b>'.$myline.' ';
         echo 'Error message: <b> '.$errormsg.' </b>';
         die();
     } else{
         echo 'WE HAVE ISSUE';
         die();
     }
 }
