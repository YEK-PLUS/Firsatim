
<style media="screen">
  .bg{
    background:#131313;
  }
  .indent{
    text-indent:4rem;
  }
  .market-select-button{
    transition: .5s all ease;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
  }
  .market-select-button>i{
    line-height: 24px;
  }
  .market-select-button >i.fa-arrow-right{
    padding-right:1rem;
    transition: 1s all ease;
  }
  .market-select-button:hover >i.fa-arrow-right,.market-select-button.active >i.fa-arrow-right{
    padding-right:.1rem;

    transform: scale(1.1);
  }
  .market-select-button:hover,.market-select-button.active{
    background:rgba(255,255,255,0.2)
  }
</style>

<div class="col-12 m-auto row bg">

  <div class="col-4 col-md-3 p-0">
    <?php
    include DIR."/src/admin-pages/header.php";
     ?>
  </div>

  <div class="col-8 col-md-9 p-4">
    <div class="tab-content text-white">

      <div class="tab-pane active" id="markets" role="tabpanel" aria-labelledby="markets-tab">
        <?php
        include DIR."/src/admin-pages/market-controller.php";
         ?>
      </div>

      <div class="tab-pane" id="kampanya" role="tabpanel" aria-labelledby="kampanya-tab">
        <?php
        include DIR."/src/admin-pages/kampanya-controller.php";
         ?>
      </div>


   </div>
  </div>

 </div>
