<?php

require_once "functions.php";

try {

  if (isset($_GET['id'])) {

    delete((int) $_GET['id']);
    
  }

} catch (Exception $e) {

  $_SESSION['message'] = $e->GetMessage();
  $_SESSION['type'] = 'danger';
  header("location:index.php");

}

?>