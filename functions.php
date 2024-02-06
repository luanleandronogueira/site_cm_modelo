<?php
ob_start();

function redirect($next)
{
  header("Location: /$next", true, 302);
  die();
}

function renderVereadores($db, $selected = '')
{
  $listar_vereadores = $db->prepare("SELECT `idVereador`, `name` FROM `vereadores` WHERE `status` != 0");
  $listar_vereadores->execute();
  $resultado_vereadores = $listar_vereadores->fetchAll();

  for ($i = 0; $i <= count($resultado_vereadores) - 1; $i++) {
    $idVereador = $resultado_vereadores[$i]['idVereador'];
    $nameVereador = $resultado_vereadores[$i]['name'];

    if ($nameVereador == $selected) {
      echo ("<option value=\"$idVereador\" selected>$nameVereador</option>");
    } else {
      echo ("<option value=\"$idVereador\">$nameVereador</option>");
    }
  }
}