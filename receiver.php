<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
	$data = ($_POST);
	print_r($data['property_price']);
        //$r = shell_exec("python3 script.py");
        //echo $r;
    } catch (Exception $e) {
        print_r($e);
    }
} else {
    echo "Hello Alien";
}
