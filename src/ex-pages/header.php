
<nav class="site-header sticky-top py-1">
  <div class="container d-flex flex-row flex-md-row justify-content-between align-items-center">
    <a style="font-size: x-large;" class="font-weight-bold" href="<?php echo DOMAIN;?>">
      <!-- <?php printSVG("logo");?> -->
      <?php echo SITE_SHORT_NAME;?>
    </a>

    <div class="col d-flex flex-row flex-md-row justify-content-between align-items-center">

      <?php
        //$data = $this->db->queryFetch('SELECT * FROM pages WHERE name = "'.$match["name"].'"');
        $data = $this->db->query('SELECT * FROM pages WHERE menu=true');
        while($row = $data->fetch()){
          echo "\n";
          echo
            '<a class="font-weight-bold d-none d-md-inline-block ml-3 mr-3" href="'.DOMAIN.$row["route"].'">'.
              ucfirst(str_replace("-"," ",$row["name"]))
              .'</a>'
          ;
        }
       ?>
     </div>

   <div class="col d-flex flex-column flex-md-row justify-content-end">

      <form class=" d-none d-md-inline-block form-inline m-0">
        <div class="md-form my-0 ">
          <input class="form-control rounded-pill" type="text" placeholder="Ara" aria-label="Ara">
        </div>
      </form>

   </div>
  </div>
</nav>
