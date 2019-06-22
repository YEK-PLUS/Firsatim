<?php

include DIR."/src/admin-functions.php";
// print_r($_POST);
switch ($match["name"]) {

  default:
    include DIR."/src/pages/".(login()?"admin-main":"admin-login").".php";
    break;
}
 ?>
