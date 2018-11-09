<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT."/core/config.php";

  echo '<pre>';
  print_r(Lots::get());
  echo '</pre>';

?>
