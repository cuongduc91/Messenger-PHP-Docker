<?php
 $con = new mysqli('db', 'root', getenv('MYSQL_ROOT_PASSWORD'), 'mychat');

  if ($mysqli->connect_error) {
    echo 'Connection Error [', $mysqli->connect_errno, ']: ', $mysqli->connect_error;
  } else {
    // echo 'MySQLi Connected Successfully!';
    echo '';
  }
?>