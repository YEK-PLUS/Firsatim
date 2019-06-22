<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>

<?php
$js_list = $this->db->query('SELECT * FROM pages where type="js"');

while($row = $js_list->fetch()){
  echo "\n".' <script src="'.DOMAIN.$row["route"].'"></script>';
}
 ?>
