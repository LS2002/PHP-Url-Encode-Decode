<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>

<?php


$username = $_POST['username'];
$url = 'http://www.abc.com/friends_pics/';

	if($username != ''){
	  //check if begins with english char
		$result = preg_match('/^[A-Z]|[a-z]/', $username[0]);
		
		if ($result){
			//english chars
			$url = $url . ucwords($username[0]) . '/' . strtoupper($username) . '/';
		}else{
			//chinese chars
			$url .= getFirstGB2312DecimalVal($username).'/P';
			for($i=0;$i<strlen($username);$i+=3) {  
				$hexStr = urlencode(mb_convert_encoding(urldecode(substr($username,$i,3)),'GB2312', 'UTF-8')); 
				$my_array = explode('%', $hexStr);
				$url .= '-'.hexdec($my_array[1])."-".hexdec($my_array[2]); //十进制  
			}  
			// echo 'decimal='.$decimal;
		}
	}

function getFirstGB2312DecimalVal($s){
	$hexStr = urlencode(mb_convert_encoding(urldecode(substr($s,0,3)),'GB2312', 'UTF-8')); 
	$my_array = explode('%', $hexStr);
	return hexdec($my_array[1]);
}


?>
<p>
<form method="post" action="index.php">
	<input type="text" value="" name="username">
	<input type="submit">
</form>

<?php
	if($username != ''){
		echo '<a href=' . $url .'>' . $url . '</a>';
	}
?>
</p>

</body>
</html>
