<?php


  $a = 0;
  if (!isset($_COOKIE["ident"]))
  {
     $a = 1;
  }
  require_once __DIR__ . '/html/head.php';
  if ($a == 1)
  {
     require_once __DIR__ . '/html/vhid.php';
  }



echo"
</body>
</html>";

?>