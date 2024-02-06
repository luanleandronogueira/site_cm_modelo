<?php
  require_once("db.php");
  require_once("../functions.php");

  if (!isset($_SESSION[$sessionIdentifier])) {
    redirect('painel/index');
    die();
  }
?>