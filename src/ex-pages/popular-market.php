<div class="col-12">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="text-white col-sm text-center font-weight-bold">
        <hr class="divider">
        <!-- <h6 class="d-block d-sm-none">Popüler Mağzalar</h6>
        <h5 class="d-none d-sm-block d-md-none">Popüler Mağzalar</h5>
        <h4 class="d-none d-md-block d-lg-none">Popüler Mağzalar</h4>
        <h3 class="d-none d-lg-block d-xl-none">Popüler Mağzalar</h3>
        <h2 class="d-none d-xl-block">Popüler Mağzalar</h2> -->
        <h1>Popüler Mağzalar</h1>
      </div>
    </div>
    <hr class="col-md-6 divider d-none d-md-block">
    <div class="col-12 col-md-8 d-flex flex-row justify-content-center">
      <?php
      $market_list = $this->db->query('SELECT * FROM markets WHERE popular=true');
      while($row = $market_list->fetch()){
        echo '<a href="'.$this->r->generate('market',array("market_id"=>"name")).'" class="pl-1 pr-1 mr-1 ml-1 rounded text-decoration-none magza-link">'.$row["name"].'</a>';
      }
       ?>
    </div>
  </div>
</div>
