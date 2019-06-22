 <?php
// SAVE AREA

$continue = (
  ( isset($match["params"]["action"]) ) &&
  ( isset($_POST["id"]) ) &&
  ( ($match["params"]["action"] == "edit-market") && ($match["name"] == "admin-action-select-save") ) &&
  ( isset($_POST["marketmanset"]) && isset($_POST["marketpopular"]) ) &&
  ( ( $_POST["marketmanset"] == "true" ) || ( $_POST["marketmanset"] == "false" ) ) &&
  ( ( $_POST["marketpopular"] == "true" ) || ( $_POST["marketpopular"] == "false" ) ) &&
  ( isset($_POST["marketresim"]) || isset($_POST["marketisim"]) )
);
$continue2 = (
  ( isset($match["params"]["action"]) ) &&
  ( ($match["params"]["action"] == "new-market") && ($match["name"] == "admin-action-select-save") ) &&
  ( isset($_POST["marketmanset"]) && isset($_POST["marketpopular"]) && isset($_POST["marketisim"]) && isset($_POST["marketresim"]) ) &&
  ( $_POST["marketisim"] != "" &&  $_POST["marketresim"] != "" ) &&
  ( ( $_POST["marketmanset"] == "true" ) || ( $_POST["marketmanset"] == "false" ) ) &&
  ( ( $_POST["marketpopular"] == "true" ) || ( $_POST["marketpopular"] == "false" ) )
);

// Boş gelen post inputu "" olarak işleniyor
if($continue):
  $this->medoo->update("markets",["carousel" => ( $_POST["marketmanset"]=="true" )?true:false ],["id" => $_POST["id"]]);
  $this->medoo->update("markets",["popular" => ( $_POST["marketpopular"]=="true" )?true:false ],["id" => $_POST["id"]]);
  if($_POST["marketisim"] != ""):
    $this->medoo->update("markets",["name" => $_POST["marketisim"] ] , ["id" => $_POST["id"] ] );
  endif;
  if($_POST["marketresim"] != ""):
    $this->medoo->update("markets",["img" => $_POST["marketresim"] ] , ["id" => $_POST["id"] ] );
  endif;
elseif($continue2):
  $kanalekleMSG = '<font color="green" face="tahoma" size="4">Kanal Ekleme Başarılı</font>';
  $this->medoo->insert("markets",[
    "name" => $_POST["marketisim"],
    "img" => $_POST["marketresim"],
    "link" => "http://google.com",
    "popular" => $_POST["marketpopular"]=="true"?1:0,
    "carousel" => $_POST["marketmanset"] == "true"?1:0
  ]);
endif;

?>
<div class="col-12 d-flex flex-row flex-wrap">
  <div class="col-8 d-flex flex-row flex-wrap">

  <!-- MARKET EKLE -->

  <div class="col-12 text-center">
    <?php
    echo isset($kanalekleMSG)? $kanalekleMSG : '';
    echo '
    <form method="post" class="align-items-center d-flex flex-row flex-wrap" action="'.$this->r->generate("admin-action-select-save",["action" => "new-market"]).'">
      '.
      ((isset($_POST["id"]) || isset($_GET["id"])) ?
      '
      <input type="hidden" name="id" value="'.(isset($_POST["id"])?$_POST["id"]:$_GET["id"] ).'">
      <input type="hidden" name="subaction" value="edit-market">
      '
      :'')
      .'
      <div class="col-6 form-group">
        <label for="marketisim">İsim</label>
        <input type="text" class="form-control" name="marketisim" id="marketisim" placeholder="TrendYol">
      </div>

      <div class="col-6 form-group">
       <label for="marketpopular">Popüler Listesinde Gösterilsinmi</label>

       <select class="form-control form-control-sm" name="marketpopular" id="marketpopular">
        <option value="true">Evet</option>
        <option value="false">Hayır</option>
       </select>
      </div>

      <div class="col-6 form-group">
        <label for="marketresim">Resim URL</label>
        <input type="text" class="form-control" name="marketresim" id="marketresim" placeholder="http://resim.com/resim.png">
      </div>

      <div class="col-6 form-group">
       <label for="marketmanset">Manset Listesinde Gösterilsinmi</label>

       <select class="form-control form-control-sm" name="marketmanset" id="marketmanset">
        <option value="true">Evet</option>
        <option value="false">Hayır</option>
       </select>
      </div>
      <button type="submit" class="btn col-12 btn-dark">Ekle</button>
    </form>
    ';
    ?>
  </div>

  <!-- MARKET SIRALA -->
  <div class="col-12 d-flex flex-row flex-wrap">
    <h4 class="col-12">Marketler</h4>

    <?php
      $data = $this->medoo->select("markets","*",["ORDER" => ["id" => "DESC"],]);

      foreach($data as $row){
        $id = $row["id"];
        $name = $row["name"];
        $img = $row["img"];
        $link = $row["link"];
        $popular = $row["popular"];
        $caroulsel = $row["carousel"];
        $total_kampanya = $this->medoo->count("kampanyalar",[ "market_id" => $id ]);
        $aktif_kampanya = $this->medoo->count("kampanyalar",[ "market_id" => $id , "active" => 1]);
        $total_clik = 0;
        $data2 = $this->medoo->select("kampanyalar","clicked_time",[ "market_id" => $id ]);

        foreach($data2 as $row2){
          $total_clik += $row2[0];
        }
        echo '

          <div class="p-0 col-6 d-flex flex-column mt-3 mb-3">

            <div class="text-center d-flex flex-row align-items-center">

              <form class="col-2 p-0 m-0"  action="'.$this->r->generate("admin-action-select",array("action"=>"edit-market")).'">
                <input type="hidden" name="id" value="'.$id.'"/>
                <button class="btn btn-link" type="submit"> <i class="fa fa-pen"></i></button>
              </form>

              <div class="col-3 ">
                <img class="rounded img-fluid" src="'.$img.'"/>
              </div>

              <div class="col-6 p-0">
                <h5 class="m-0">'.$name.'</h5>
              </div>

              <div class="col-1 p-0">

                <button class="col btn btn-link p-0" type="button" data-toggle="collapse" data-target="#collapse-'.$id.'" aria-expanded="false" aria-controls="collapse-'.$id.'">
                  <i class="fa fa-angle-down"></i>
                </button>

              </div>
            </div>

            <div class="collapse mt-2" id="collapse-'.$id.'">
              <div class="text-center d-flex flex-wrap col-12 p-0">

                <div class="col-8 text-right text-nowrap p-0 pr-2 border-right">İsim              </div><span class="border-left col-4 text-left text-nowrap p-0 pl-2"> '.$name.'</span>
                <div class="col-8 text-right text-nowrap p-0 pr-2 border-right">Offical link      </div><span class="border-left col-4 text-left text-nowrap p-0 pl-2"> <a class="text-white" target="_blank" href="'.$link.'">Git <i class="fa fa-external-link-alt"></i></a></span>
                <div class="col-8 text-right text-nowrap p-0 pr-2 border-right">Populer           </div><span class="border-left col-4 text-left text-nowrap p-0 pl-2"> '.($popular?'evet':'hayır').'</span>
                <div class="col-8 text-right text-nowrap p-0 pr-2 border-right">Manşetlerde       </div><span class="border-left col-4 text-left text-nowrap p-0 pl-2"> '.($caroulsel?'evet':'hayır').'</span>
                <div class="col-8 text-right text-nowrap p-0 pr-2 border-right">Toplam Kampanya   </div><span class="border-left col-4 text-left text-nowrap p-0 pl-2"> '.$total_kampanya.'</span>
                <div class="col-8 text-right text-nowrap p-0 pr-2 border-right">Aktif Kampanya    </div><span class="border-left col-4 text-left text-nowrap p-0 pl-2"> '.$aktif_kampanya.'</span>
                <div class="col-8 text-right text-nowrap p-0 pr-2 border-right">Toplam Tıklanma   </div><span class="border-left col-4 text-left text-nowrap p-0 pl-2"> '.$total_clik.'</span>

              </div>
            </div>
          </div>';
      }
    ?>
  </div>

  </div>

 <!-- MARKET EDİT -->
 <div class="col-4 d-flex flex-row flex-wrap border-left">
   <?php
    $continue = (
      ( isset($match["params"]["action"]) ) &&
      ( ($match["params"]["action"] == "edit-market") || ( isset( $_POST["subaction"] ) && $_POST["subaction"] == "edit-market" ) ) &&
      (isset($_GET["id"]) || isset($_POST["id"])) &&
      $match["name"] != "admin-main"?true:false
    );
    if($continue):
      $market_id = isset($_GET["id"])?$_GET["id"]:$_POST["id"];
      $market = $this->medoo->select("markets","*",[ "id" => $market_id ])[0];
      $img = $market["img"];
      $name = $market["name"];
      $popular = $market["popular"];
      $carousel = $market["carousel"];
      // echo '
        // <div class="col-12 d-flex flex-row">
          // <div class="col-3 ">
            // <img class="rounded img-fluid" src="'.$img.'"/>
          // </div>
          // <div class="col-6 p-0">
            // <h5 class="m-0">'.$name.'</h5>
          // </div>
        // </div>
      // ';

      echo '
        <form method="post" action="'.$this->r->generate("admin-action-select-save",["action" => "edit-market"]).'">
          <input type="hidden" name="id" value="'.$market_id.'">
          <div class="form-group">
            <label for="marketisim">İsim</label>
            <input type="text" class="form-control" name="marketisim" id="marketisim" placeholder="'.$name.'">
          </div>

          <div class="form-group">
            <label for="marketresim">Resim URL</label>
            <input type="text" class="form-control" name="marketresim" id="marketresim" placeholder="'.$img.'">
          </div>

          <div class="form-group">
           <label for="marketpopular">Popüler Listesinde Gösterilsinmi</label>

           <select class="form-control form-control-sm" name="marketpopular" id="marketpopular">
            <option value="'.( ($popular) ? 'true' : 'false' ).'">'.( ($popular) ? 'Evet' : 'Hayır' ).'</option>
            <option value="'.( ($popular) ? 'false' : 'true' ).'">'.( ($popular) ? 'Hayır' : 'Evet' ).'</option>
           </select>
          </div>

          <div class="form-group">
           <label for="marketmanset">Manset Listesinde Gösterilsinmi</label>

           <select class="form-control form-control-sm" name="marketmanset" id="marketmanset">
             <option value="'.( ($carousel) ? 'true' : 'false' ).'">'.( ($carousel) ? 'Evet' : 'Hayır' ).'</option>
             <option value="'.( ($carousel) ? 'false' : 'true' ).'">'.( ($carousel) ? 'Hayır' : 'Evet' ).'</option>
           </select>
          </div>
          <button type="submit" class="btn col-12 btn-dark">Güncelle</button>
        </form>
      ';
    endif;
   ?>
 </div>



</div>
