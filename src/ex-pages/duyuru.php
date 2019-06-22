<?php

if($match["name"]=="home"){
  $data = $this->db->query('SELECT * FROM duyuru WHERE type="manset"');

  while($row = $data->fetch()){

    $title = $row["title"];
    $link = $row["link"];
    $button_text = $row["button_text"];
    $image = $row["image"];
    $id = $row["id"];
    $text = '
      <div class="col-12">
        <div class="row">
          '.
          ((isset($image) && $image != "")?
          '
          <div class="col-2 col-md-4">
            <img class="img-fluid img-thumbnail" src="'.$image.'"/>
          </div>
          ':'').
          '

          <div class="text-white col-sm text-center font-weight-bold">
            <!--<h6 class="d-block d-sm-none">'.$title.'</h6> -->
            <!--<h5 class="d-none d-sm-block d-md-none">'.$title.'</h5> -->
            <!--<h4 class="d-none d-md-block d-lg-none">'.$title.'</h4> -->
            <!--<h3 class="d-none d-lg-block d-xl-none">'.$title.'</h3> -->
            <!--<h2 class="d-none d-xl-block">'.$title.'</h2> -->
            <h1>'.$title.'</h1>
          </div>

        </div>
      </div>
    ';
    echo $text;
  }

}



?>
