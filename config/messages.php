<?php
if (isset($messageErro)) {
?>
  <div class="alert alert-danger text-center" role="alert"><i class="fas fa-exclamation-triangle"> <?php echo ($messageErro) ?></i></div>
<?php
  unset($messageErro);
}
?>

<?php
if (isset($messageSucesso)) {
?>
  <div class="alert alert-success text-center" role="alert"><i class="far fa-check-circle"> <?php echo ($messageSucesso) ?></i></div>
<?php
  unset($messageSucesso);
}
?>

<?php
if (isset($_SESSION['successMessage']) && !empty($_SESSION['successMessage'])) {
?>
  <div class="alert alert-success text-center" role="alert"><?php echo ($_SESSION['successMessage']) ?></div>
<?php
  $_SESSION['successMessage'] = "";
  unset($_SESSION['successMessage']);
}
?>

<?php
if (isset($_SESSION['erroMessage']) && !empty($_SESSION['erroMessage'])) {
?>
  <div class="alert alert-danger text-center" role="alert"><?php echo ($_SESSION['erroMessage']) ?></div>
<?php
  $_SESSION['erroMessage'] = "";
  unset($_SESSION['erroMessage']);
}
?>