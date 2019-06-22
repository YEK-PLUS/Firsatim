<?php
/**
 * Methods Class
 */
class Methods
{
  function addMethod($name,$method){
    if(!$this->methodNameControl($name)):
      $this->{$name} = $method;
    endif;
  }
  function methodNameControl($name){
    return isset($this->{$name}) ? true : false;
  }
  public function __call($name, $arguments){
      return call_user_func($this->{$name}, $arguments);
    }
}


?>
