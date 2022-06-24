<html>
<?php
	$username = "janpieterzoonkoentje";
	$user = "bek";
	
	$len_username = strlen($username);
	//echo substr($username, 0, -6);


	$string = "halloditiseentestomtezienofditscriptwerkt";

	if (strlen($string) >= 12) {
    echo substr($string, 0, 12). " ... ";
}
else {
    echo $string;
}
?></html>