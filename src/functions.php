<?php
function printSVG($name){
  if(file_exists(DIR."/asset/svg/".$name.".svg")){
    echo file_get_contents(DIR."/asset/svg/".$name.".svg");
  }
}
function getSVG($name){
  if(file_exists(DIR."/asset/svg/".$name.".svg")){
    return file_get_contents(DIR."/asset/svg/".$name.".svg");
  }
}
 ?>
