<?php
highlight_file(__FILE__);

class evil{
	public $cmd;

	public function __construct($cmd){
		$this->cmd = $cmd;
	}

	public function __destruct(){
		system($this->cmd);
	}
}

class User
{
	public $username;
	public $password;

	public function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
	}

}

function write($data){
	global $tmp;
	$data = str_replace(chr(0).'*'.chr(0), '\0\0\0', $data);
	$tmp = $data;
}

function read(){
	global $tmp;
	$data = $tmp;
	$r = str_replace('\0\0\0', chr(0).'*'.chr(0), $data);
	return $r;
}

$tmp = "test";
$username = $_POST['username'];
$password = $_POST['password'];

write(serialize(new User($username, $password)));
var_dump(unserialize(read()));