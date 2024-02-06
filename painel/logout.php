<?php
  require_once('../config/db.php');
  require_once('../functions.php');
  session_destroy();

  redirect('painel/index');
?>