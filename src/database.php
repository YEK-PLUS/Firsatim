<?php
  /*
  * Author:YEK | Yunus Emre Köker
  * Date:15.05.19
  * Url:GitHub.com/YEK-PLUS
  */
  class DataBase{

    function __construct($conf){
      $host = $conf["host"];
      $name = $conf["name"];
      $user = $conf["user"];
      $pass = $conf["pass"];
      $this->connect($host,$name,$user,$pass);
    }

    function exec($query){
      try{
        $this->db->exec($query);
      }
      catch(PDOException $e){
        $this->error($e->getMessage());
      }
    }

    function query($query){
      $returns;
      try{
        $returns = $this->db->prepare($query);
        $returns->execute();
      }
      catch(PDOException $e){
        $this->error($e->getMessage());
      }
      return $returns;
    }

    function queryFetch($query){
      return $this->query($query)->fetch();
    }

    function connect($host,$name,$user,$pass){
      try {
        $this->db = new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $user, $pass);
      }
      catch (PDOException $e) {
        $this->error($e->getMessage());
      }
    }

    function error($data)
    {
      echo $data;
      //main::error($data);
    }


  }
 ?>
