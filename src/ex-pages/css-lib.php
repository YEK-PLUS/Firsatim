<?php
$METHODS->addMethod("add_css_libs",function(){
  global $MEDOO;
  $css_list = $MEDOO->select("pages","*",["type"=>"css"]);
  foreach ($css_list as $row) {
    echo "\n\t".'<link rel="stylesheet" href="'.DOMAIN.$row["route"].'">';
  }

});


 ?>
