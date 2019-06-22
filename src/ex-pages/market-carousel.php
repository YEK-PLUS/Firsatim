<!-- Top content -->
<div class="col-6 mt-4 mb-4 ml-auto  mr-auto  top-content">
  <hr class="divider">
    <div class="container-fluid">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php
                $first = true;
                $market = $this->db->query("SELECT * FROM markets WHERE carousel=1");
                while($row = $market->fetch()){
                  echo '
                  <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 '.($first?'active':'').'">
                      <a href="'.DOMAIN.$this->r->generate("market",array("market_id"=>$row["name"])).'">
                        <img src="'.$row["img"].'" class="img-fluid mx-auto d-block" alt="img1">
                      </a>
                  </div>
                  ';
                  $first = false;
                }
                unset($first);
                ?>


            </div>
        </div>
    </div>
</div>
<script>
  /*
    Carousel
  */
  $('#carousel-example').on('slide.bs.carousel', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;

    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
  });
</script>
