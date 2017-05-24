<?php

function getSql($login, $pass)
{
	$password = sha1('€'.$pass.'€');

	$Sql = "SELECT user_id,nom FROM planning_user WHERE login='$login' AND password='$password'";
	return $Sql;
}

//echo getSQL('admin','password');