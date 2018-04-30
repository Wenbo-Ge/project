<?php

if ($_POST['submitTotal']) {
	$response = array(
		'res'=>'Purchase successful!'
	);
}else{
	$response = array(
		'res'=>'Please add some items!'
	);
}


echo json_encode($response);


?>