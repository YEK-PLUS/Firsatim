<?php

$METHODS->addMethod("addCss",function(){
  echo '<style>';
  $css_file_list_dir = DIR."/asset/css";
  $css_file_list = scandir($css_file_list_dir);
  $css_file_list = array_diff($css_file_list,[".",".."]);

  foreach ($css_file_list as $key => $value) {
    $data = file_get_contents(DIR."/asset/css/".$value);
    echo $data;
  }



  echo '</style>';

  echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">';
});







?>
