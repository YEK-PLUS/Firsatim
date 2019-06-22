<?php
$market_id = $match["params"]["market_id"];
$kampanya_id = $match["params"]["kampanya_id"];

$market = $this->db->queryFetch("SELECT * FROM markets WHERE id='$market_id'");
$kampanya = $this->db->queryFetch("SELECT * FROM kampanyalar WHERE id='$kampanya_id'");
$link = "http://firsatim.yek";
$this->db->exec("UPDATE kampanyalar SET clicked_time = clicked_time + 1 WHERE id = ".$kampanya_id);
?>


<div style="max-height: 100vh;min-height: 100vh;" class="col-12 d-flex align-items-center">
        <div class="row justify-content-center col-12">

          <div class="col-12 d-flex justify-content-center">
              <div class="col-7 col-md-2 col-xl-1 col-sm-4 text-center">
                <img class="img-fluid d-inline-block" src="<?php echo $market["img"];?>"/>
              </div>
          </div>
          <div class="col-12 d-flex justify-content-center">
            <div class="dots mt-4 mb-4">
                <div></div>
                <div></div>
                <div></div>
            </div>
          </div>

          <div class="col-12 d-flex flex-column justify-content-center text-center">
              <div>
                Yönlendiriliyorsunuz
              </div>
              <div class="mt-3">
                <a href="<?php echo $link;?>" class="magza-link p-1 text-decoration-none rounded">
                  Eğer iki saniye içinde yönlenirilmezseniz tıklayınız
                </a>
              </div>
          </div>

        </div>
</div>
<style>
  body{
    background:linear-gradient(90deg, rgba(168,255,0,1) 0%, rgba(255,0,5,1) 100%);
  }
  .site-header{
    display:none;
  }
</style>
<script>
  window.setTimeout(
    function(){
      window.location.href="<?php echo $link;?>";
    },1000);
</script>
