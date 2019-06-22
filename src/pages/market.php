<?php
$market_name = $match["params"]["market_id"];

// $market_detail = $this->db->queryFetch("SELECT * from markets WHERE name = '$market_name'");
if($this->medoo->has("markets",["name" => $market_name])){
  $market_detail = $this->medoo->select("markets","*",["name" => $market_name])[0];
  $market_id = $market_detail["id"];

  $kampanya_sayisi = $this->medoo->count("kampanyalar",["market_id"=>$market_id,"active"=>1]);
  $populer_marketler = $this->medoo->select("markets","*",["popular"=>1,"LIMIT" => 15]);
  $other_markets = $this->db->query("SELECT * FROM markets WHERE id != $market_id ORDER BY id ASC");
  echo '

    <div class="col-12">
      <div class="row">

        <div class="col-12 top-bar p-5 d-flex d-sm-row flex-row flex-wrap text-white">
          <div class="col-12 col-md-8">
            <h3>'.$market_detail["name"].' İndirim Kuponları</h3>
            <h5>'.date("M Y").'</h5>
          </div>

          <div class="col-12 col-md-4 text-sm-right">
            <h3>'.$kampanya_sayisi.' Aktif indirim</h3>
          </div>
        </div>

        <div class="col-12 d-flex flex-md-row flex-sm-column flex-wrap">
          <div class="col-md-4 bg-danger align-self-end">
            Popüler Mağazalar
            
          </div>
        </div>
      </div>
    </div>
  ';
}
else{
  $this->IncludeErrorPage();
}

?>
