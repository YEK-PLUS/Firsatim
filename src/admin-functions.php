<?php
function __($data){
	return (
		( isset($_POST[$data]) )
		?$_POST[$data]:null
	);
}
function ___($data){
	return (
		( isset($_SESSION[$data]) )
		?$_SESSION[$data]:null
	);
}
function login(){
  global $DB;
  $db = $DB;
	$username = (
		(__("username") != null)
		?__("username"):___("username") );
	$pass = __("pass");
	$q = 'SELECT * FROM users WHERE username="'.$username.'" ';
	$user = $db->queryFetch($q);
	if(!empty($user) &&  $user["pass"] == $pass){
		$_SESSION["pass"] = __("pass");
		$_SESSION["username"] = __("username");
		return true;
	}
	if(___("pass") != null && ___("username") != null)
	{
		if(!empty($user) &&  $user["pass"] == ___("pass")){
		return true;
		}
	}
	return false;
}


?>
